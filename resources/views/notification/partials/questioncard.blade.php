
@foreach ($variable as $key => $value)
    <div class="card-content sections">
        <div class="col s12">
            <p>What do you think is jane's relationship status</p>
        </div>
        <div class="col s12">
            <p>
                <input class="with-gap" name="group1" type="radio" id="test1" />
                <label for="test1">Single</label>
            </p>
            <p>
                <input class="with-gap" name="group1" type="radio" id="test2" />
                <label for="test2">Taken</label>
            </p>
            <p>
                <input class="with-gap" name="group1" type="radio" id="test3"  />
                <label for="test3">Not Sure</label>
            </p>
        </div>

    </div>
    <div class="divider"></div>
@endforeach
