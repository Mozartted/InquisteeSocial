<div class="modal card modal-fixed-footer" id="message" style="height:35%">
    <div class="modal-content">
        <div class="card-header">
            <div>Send a Message</div>
        </div>
        <div class="card-content">
          <!--The messaging box-->
          <div class="col s12">
              <form>
                <div class="input-field">
                    <label for="Message">
                      Send a message to {{ $profile['username'] }}
                    </label>
                    <input id="useridno" data-id="{{ $profile['id'] }}" type="hidden" val="" />
                    <textarea id="Message" class="materialize-textarea"></textarea>
                </div>
              </form>
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <a id="messageUploaded" class="modal-action modal-close waves-effect waves-green btn-flat" data-id="" data-status="">Send</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
    </div>
</div>
