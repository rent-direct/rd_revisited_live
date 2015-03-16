
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Inbox | Read</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Read Message...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">

                                <p><strong>From: <?= $single_message['name']?></strong></p>
                                <p><?= $single_message['message']?></p>


                                <br/>
                                <br/>
                                <h3>Quick Reply.....</h3>
                                <br/>

                                <div class="form-group">
                                    <label>Quick Subject</label>
                                    <input class="form-control" name="subject">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>

                                <div class="form-group">
                                    <label>Quick Reply Message</label>
                                    <textarea class="form-control" rows="8" name="message_body"></textarea>
                                </div>

                                <button type="submit" class="btn btn-default">Send Message</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>
                            </form>

                        </div>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
