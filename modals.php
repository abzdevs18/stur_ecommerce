<div role="dialog" tabindex="-1" class="modal" id="remove_item_n">
    <div class="modal-dialog" role="document" style="max-width: 400px;">
        <div class="modal-content" style="position: relative;top: 100px;">
            <div class="modal-header">
            	<button type="button" class="close m_c" data-dismiss="modal" aria-label="Close" style="outline: none;"><span aria-hidden="true" style="font-size: 40px;">×</span></button>
            </div>
            <div class="modal-body">
                <p>Item(s) will be removed from cart</p>
                <input type="hidden" id="cart_id">
                <input type="hidden" id="prod_pk">
                <input type="hidden" id="customer_id">
            </div>
            <div class="modal-footer">
            	<button class="btn btn-light" type="button" onclick="cancel()" data-dismiss="modal" id="cancel_q" style="text-transform:uppercase;font-size: 13px;">Cancel</button>
            	<button class="btn btn-primary rem" type="button" style="background-color:#1a9cb7 !important;text-transform:uppercase;font-size: 13px;">Remove</button></div>
        </div>
    </div>
</div>