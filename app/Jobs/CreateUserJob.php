<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class CreateUserJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $username;
    protected $password;
    protected $password_confirmation;
    protected $gender;
    protected $profileimage;
    protected $profileImagePath;
    protected $birthday;

    public function __construct(
        $firstname,
        $lastname,
        $email,
        $username,
        $password,
        $password_confirmation,
        $gender,
        $profileImagePath,
        $birthday
    )
    {
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->password=bcrypt($this->password);
        $this->profileImagePath = $profileImagePath;
		$this->birthday = $birthday;
        $this->profileImagePath=$profileImagePath;
        $this->gender=$gender;
        $this->username=$username;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user =new User([
            'username'=>$this->username,
            'email'=>$this->email,
            'password'=>$this->password,
        ]);

        $user->save();

        $profile=new \App\Models\Profile(
            ['birthday'=>$this->birthday,
            'first_name'=>$this->firstname,
            'last_name'=>$this->lastname,
            'gender'=>$this->gender,
            ]
        );

        $user->profile()->save($profile);

        Auth::login($user);

        return $user;
    }
}