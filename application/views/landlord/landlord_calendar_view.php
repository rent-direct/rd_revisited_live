<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Calendar</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <label>A calendar for general landlord use....</label>
    <div id='calendar'>

<!--- End Div --->
</div>

    <script>
        $(document).ready(function () {
            var calendar = $('#calendar').fullCalendar({
                eventSources: [

                    // your event source
                    {
                        url: '/ajax/calendar_add'
                    }
                ]
            });

        });
    </script>