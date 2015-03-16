
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">PAYMENT SUCCESSFUL!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Payment Details...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            Thank you for your payment for the <? if(isset($OrderID)) { echo $OrderID; } ?>, your listing will expire in 30 days time on <strong><? if(isset($ExpireDate)) { echo $ExpireDate; } ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>