
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Inbox | Compose</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Compose New Message
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">


                                <div class="form-group">
                                    <label>To User/Tenant</label>
                                    <input class="form-control" name="to_id">
                                    <p class="help-block">Please make sure Tenant Username is Correct (You'd of got this from queries?)</p>
                                </div>

                                <div class="form-group">
                                    <label>Subject</label>
                                    <input class="form-control" name="subject">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="8" name="message_body"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>In Regards to which Property? (Optional)</label>
                                    <select class="form-control">
                                        <option>None</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Optional Images</label>
                                    <input type="file">
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
