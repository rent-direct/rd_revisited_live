<?
        // Concatenate the full address
        $address = $request_data['address_1'] . ", " . $request_data['address_2'] . ", " . $request_data['city'] . ", " . $request_data['postcode'];
        // Set viewing times string if viewing times are available
        if (isset($request_data['time_from']) && !empty($request_data['time_from'])) {
            $time_from = $request_data['time_from'];
        }
        if (isset($request_data['time_to']) && !empty($request_data['time_to'])) {
            $time_to = $request_data['time_to'];
        } ?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Viewing Request</h1>
            <h3>Received on <?= $request_data['recieved'] ?></h3></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

        <!--- Chat Panel Splitter ---->
    <div class="row">
        <div class="col-md-6">

            <?  if (isset($request_data['messages']) && is_array($request_data['messages'] )) { ?>

            <!--- Chat Panel Start ---->
            <div class="chat-panel panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-fw"></i>
                    Messaging: <?= $request_data['name'] ?>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a href="<? echo base_url('landlord/refresh') ?>">
                                    <i class="fa fa-refresh fa-fw"></i> Refresh
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-check-circle fa-fw"></i> Available
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-times fa-fw"></i> Busy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-clock-o fa-fw"></i> Away
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<? echo base_url('landlord/logout') ?>">
                                    <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="chat" id="message_container">
                    <?
                        foreach ($request_data['messages'] as $key => $value) {
                            if ($value['message'] != '') {
                                $message_tenant_id = $value['message_tenant_id']; // Same every iteration of the loop so doesn't get overwritten, but yes, it's messy!
                                $align_class = "";
                                if ($value['message_from_id'] != $user_data['id']) {
                                    // Tenants side
                                    echo ('<li class="left clearfix">');
                                    echo ('<span class="chat-img pull-left">');
                                    echo ('<img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" /> ');
                                    echo ('</span> ');
                                    echo ('<div class="chat-body clearfix"> ');
                                    echo ('<div class="header"> ');
                                    echo (' <strong class="primary-font">' . $request_data['name'] . '</strong> ');
                                    echo ('<small class="pull-right text-muted"> ');
                                    echo (' <i class="fa fa-clock-o fa-fw"></i>' . $value["message_datetime"]);
                                    echo ('</small> ');
                                    echo ('</div> ');
                                    echo ('<p> ');
                                    echo ($value['message']);
                                    echo ('</p> ');
                                    echo ('</div> ');
                                    echo ('</li> ');

                                } else {

                                    // landlords side
                                    echo (' <li class="right clearfix">  <span class="chat-img pull-right"> ');
                                    echo (' <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" /> ');
                                    echo ('</span>  <div class="chat-body clearfix"> <div class="header">  <small class=" text-muted">');
                                    echo (' <i class="fa fa-clock-o fa-fw"></i>' . $value["message_datetime"]);
                                    echo ('</small> ');
                                    echo ('  <strong class="pull-right primary-font">Landlord</strong> ');
                                    echo (' </div>  <p>');
                                    echo ($value['message']);
                                    echo (' </p>   </div> </li>');
                                    echo (' ');
                                    echo (' ');
                                }
                                }
                        }
                    }
                    ?>
                    <!--- End Chat ---->
                </ul>
            </div>
                <!-- CHAT INPUT -->
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="send_message">
                                        Send
                                    </button>
                                </span>
                    </div>
                </div>
                <form name="viewing_messages" id="viewing_messages">
                    <div class="input-group">
                        <input type="hidden" id="message_viewing_id" name="message_viewing_id"
                               value="<?= $request_data['viewing_id'] ?>"/>
                        <input type="hidden" id="message_landlord_id" name="message_landlord_id"
                               value="<?= $user_data['id'] ?>"/>
                        <input type="hidden" id="message_from_id" name="message_from_id"
                               value="<?= $user_data['id'] ?>"/>
                        <input type="hidden" id="message_tenant_id" name="message_tenant_id"
                               value="<?= $request_data['tenant_id'] ?>"/>

                    </div>
                </form>

            </div>
            <!--- Chat Panel End ---->
        </div>
        <div class="col-md-6">
            <h3>Tenant Details</h3>
            <p>Name:</p>
            <p>Phone:</p>
            <p>Prop Title Query:</p>
            <label>Number of visitors to the property page</label>
            <p><small>(Potential Market)</small></p>
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>
        <!--- end row --->
    </div>
            <h3>Calendar</h3>
            <div id='calendar'>
            </div>

        <script> //Ajax & Javascript Calls
            $(document).ready(function () {
                $('#send_message').click(function () {
                    send_message();
                });
                $(document).keypress(function (e) {
                    if (e.which == 13) {
                        e.preventDefault();
                        if ($("#btn-input").is(":focus")) {
                            send_message();
                        }
                    }
                });
                function send_message() {
                    $.post('/ajax/add_message', $('#viewing_messages').serialize(), function () {
                        $('#message_container').append('<div class="message_bubble message_left">' + $('#btn-input').val() + '</div>');
                        $('#name').val('');
                        $("#message_container").animate({ scrollTop: $("#message_container")[0].scrollHeight}, 500);
                    });
                }

                // page is now ready, initialize the calendar...
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var title = prompt('Event Title:');
                        if (title) {
                            calendar.fullCalendar('renderEvent',
                                {
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                },
                                true // make the event "stick"
                            );
                        }
                        calendar.fullCalendar('unselect');
                    },
                    editable: true,
                    events: [
                        {
                            title: 'All Day Event',
                            start: new Date(y, m, 1)
                        },
                        {
                            title: 'Long Event',
                            start: new Date(y, m, d+5),
                            end: new Date(y, m, d+7)
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, d-3, 16, 0),
                            allDay: false
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, d+4, 16, 0),
                            allDay: false
                        },
                        {
                            title: 'Meeting',
                            start: new Date(y, m, d, 10, 30),
                            allDay: false
                        },
                        {
                            title: 'Lunch',
                            start: new Date(y, m, d, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false
                        },
                        {
                            title: 'Birthday Party',
                            start: new Date(y, m, d+1, 19, 0),
                            end: new Date(y, m, d+1, 22, 30),
                            allDay: false
                        },
                        {
                            title: 'EGrappler.com',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            url: 'http://EGrappler.com/'
                        }
                    ]
                });

            });
        </script>

    <script>
        $(document).ready(function () {
            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { year: '2008', value: 20 },
                    { year: '2009', value: 10 },
                    { year: '2010', value: 5 },
                    { year: '2011', value: 5 },
                    { year: '2012', value: 20 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });
        });
    </script>

<!----- End Div ----->
</div>