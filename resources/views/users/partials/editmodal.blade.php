<div class="modal card modal-fixed-footer" id="edit">
    <div class="modal-content">
        <div class="card-header">
            <div>Edit Profile</div>
        </div>

        <div class="card-content">

                <div class="col s12">
                    <span class="header_medium color-grey">Upload A Profile Picture</span>
                </div>
                <div class="divider borlined"></div>
                <div class="col s12">

                    <form>
                        <div class="col s12">
                            <div id="upload-into"></div>
                            <input type="hidden" id="imagebase64" name="imagebase64">

                        </div>

                        <div class="divider"></div>
                        <div class="col s12">
                            <a class="btn file-btn">
                                <span>Upload</span>
                                <input type="file" id="uploading" accept="image/*">
                            </a>


                            <button  class="btn-flat upload-result">Send</button>
                        </div>

                    </form>

            </div>
            <div class="divider borlined"></div>
            <div class="col s12">
                <div class="col s12">
                    <span class="header_medium color-grey">Edit Discriptions and Likes</span>
                </div>
                <div class="input-field">
                    <label for="description">
                        Your Introduction
                    </label>
                    <textarea id="description" class="materialize-textarea"></textarea>
                </div>

                <div class="input-field">
                    <label for="place">
                        Location
                    </label>
                    <textarea id="place" class="materialize-textarea"></textarea>
                </div>

                <div class="input-field col s12">
                    <input type="text" id="username">
                    <label for="username">Pick a cute Username</label>
                </div>
                <div class="col s12">
                    <div class="btn red center white-text">Complete description</div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
</div>
