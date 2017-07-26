<script>

    // Activate Next Step
        $(document).ready(function() {
            var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();
        navListItems.click(function(e)
        {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                navListItems.closest('li').removeClass('active');
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        // DEMO ONLY //
        $('#activate-step-2').on('click', function(e) {
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-3').on('click', function(e) {
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-4').on('click', function(e) {
            $('ul.setup-panel li:eq(3)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-4"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-3').on('click', function(e) {
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            $(this).remove();
        })
         });
        function Calculate()
        {
            
          var resources = document.getElementById('Resources').value;
          var minutes = document.getElementById('Minutes').value; 
          
          var payamount = document.getElementById('Payamount').value;
         
          document.getElementById('answer').value=parseFloat(resources) - parseFloat(minutes);

          var tempamount = document.getElementById('answer').value;
          document.getElementById('result').value=parseFloat(tempamount)/parseFloat(payamount);
         


          // for balance amount

          var receive = document.getElementById('Received').value;
          document.getElementById('balance').value=parseFloat(tempamount)-parseFloat(receive);
           document.form1.submitt();
        } 
 
    
  $('#Installment').on('change',function(){
        if( $(this).val()==="yes"){
            $("#installmenttype").show()
            
        }
        else{
            $("#installmenttype").hide()
            
        }
    }); 
   
var ical;   	
    /*
     Create the Calendar.
     */
    function drawCalendar()
    {  
        ical = new Web2Cal('calendarContainer', {
            loadEvents: loadCalendarEvents,  
            onPreview: onPreview,
			onNewEvent: onNewEvent		
        });
        ical.build();
    } 
	function loadCalendarEvents()
	{
		ical.render( getCalendarData() );
	}
	var activeEvent; 
    function onPreview(evt, dataObj, html)
	{
		activeEvent=dataObj; 
		ical.showPreview(evt, html);
	}
    /*
     Method invoked when event is moved or resized
     @param event object containing eventID and newly updated Times
     */
    function updateEvent(event)
    { 
        ical.updateEvent(event);
    }
    
    /*
     Method invoked when creating a new event, before showing the new event form.
     @param obj - Object containing (startTime, endTime)
     @param groups - List of Group objects ({groupId, name})
     @param allday - boolean to indicate if the event created is allday event.
     */
    function onNewEvent(obj, groups, allday)
    {
        Web2Cal.defaultPlugins.onNewEvent(obj, groups, allday); 
    }
     
    
    /*
     Click on Edit Button in preview window
     */
    function rzEditEvent(evId, winEvent)
    { 
        var evObj=ical.getEventById(evId); 
		/*
		var groups=ical.getAllGroups();
		groupDD=jQuery("#defaultNewEventTemplate").find("#eventGroup").get(0);
		removeAllOptions(groupDD);
		for(var g in groups)
		{	
			if(!groups.hasOwnProperty(g))
				continue;
			var gId = groups[g].groupId;
			addOption(groupDD, groups[g].groupName,groups[g].groupId,false);
		} 
		*/
		jQuery("#defaultNewEventTemplate").find("#eventName").val(evObj.eventName).end()
							.find("#eventGroup").val(evObj.groupId).end()
							.find("#eventStartTime").val(evObj._startTime.toNiceTime()).end()
							.find("#eventEndTime").val(evObj._endTime.toNiceTime()).end()
							.find("#eventStartDate").val(evObj._startTime.toStandardFormat()).end()
							.find("#eventEndDate").val(evObj._endTime.toStandardFormat()).end()
							.find("#addEventBtn").hide().end()
							.find("#updateEventBtn").show().end();
		  
		ical.showEditEventTemplate(jQuery("#defaultNewEventTemplate"), evObj.eventId, winEvent);
		ical.hidePreview();
    }
    
    
    function rzUpdateEvent()
	{
		 var updEv = Web2Cal.defaultPlugins.getNewEventObject();
		 updEv['eventId']=activeEvent.eventId;
		 jQuery("#defaultNewEventTemplate").hide();
       	ical.updateEvent(updEv);
	}
    /**
     Clicking delete in Preview window
     */
    function rzDeleteEvent()
    {
        //alert("Delete Event in DB and invoke ical.deleteEvent({eventId: id})");
		ical.deleteEvent({eventId: activeEvent.eventId});
		ical.hidePreview();
    }
    
    
    /**
     * Click of Add in add event box.
     */
    function rzAddEvent()
    {
        var newev = Web2Cal.defaultPlugins.getNewEventObject();
        ical.addEvent(newev);
    }
    
    /**
     * Onclick of Close in AddEvent Box.
     */
    function rzCloseAddEvent()
    {
        ical.closeAddEvent();
		ical.hidePreview();
    }
     
    /**
     * Once page is loaded, invoke the Load Calendar Script.
     */
    jQuery(document).ready(function()
    { 
	 	drawCalendar(); 
	 	
		new Web2Cal.TimeControl(jQuery("#eventStartTime").get(0));
        new Web2Cal.TimeControl(jQuery("#eventEndTime").get(0), jQuery("#eventStartTime").get(0), {
            onTimeSelect: updateDateForTime,
            dateField: "eventEndDate"
        });
    });

</script>
