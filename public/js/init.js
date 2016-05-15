(function($){
  $(function(){

     $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    });

    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100 // Creates a dropdown of 15 years to control year
  });
     $('select').material_select();
     // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    // trying to get the values of cities based on state from the database


  }); // end of document ready
})(jQuery); // end of jQuery name space


$(document).on('change', '#state_id', function (e) {
        $('#city_id').empty();            
        $.ajax({
                type: "POST",
                dataType: "json",
                url : "/admissions/city/",
                data : $('#state_id').serialize(),
                success:function(data){     
                    if(!data.error){                                 
                        for (var i = 0; i < data.length; i++) { 
                          $('#city_id').append($('<option>', {
                                                      value: data[i].id,
                                                      text: data[i].name
                                                  })).material_select();

                        }

                        }else{
                            alert(data);
                        }
                },
                timeout:10000
        }); 
  });        //end of state_id ajax call for cities                
    
    $(document).on('change', '#institute', function (e) {
        $('#term').empty();            
        $.ajax({
                type: "POST",
                dataType: "json",
                url : "/admissions/term/",
                data : $('#institute').serialize(),
                success:function(data){     
                      if(!data.error){ 
                        for (var i = 0; i < data.length; i++) {
                          $('#term').append($('<option>', {
                                                      value: data[i].id,
                                                      text: data[i].name
                                                  })).material_select();
                        }

                        }else{
                            alert(data);
                        }
                },
                timeout:10000
        });                         
    }); //end of institute ajax call for terms 
    $(document).on('change', '#term', function (e) {

        $('#program').empty();            

        $.ajax({
                type: "POST",
                dataType: "json",
                url : "/admissions/program/",
                data : $('#term').serialize(),
                success:function(data){     
                      if(!data.error){ 
                        for (var i = 0; i < data.length; i++) {
                          $('#program').append($('<option>', {
                                                      value: data[i].id,
                                                      text: data[i].name
                                                  })).material_select();
                        }

                        }else{
                            alert(data);
                        }
                },
                timeout:10000
        });                         
    }); //end of terms ajax call for programs 
    $(document).on('change', '#program', function (e) {

        $('#decision').empty();            

        $.ajax({
                type: "POST",
                dataType: "json",
                url : "/admissions/decision/",
                data : $('#program').serialize(),
                success:function(data){     
                      if(!data.error){ 
                        for (var i = 0; i < data.length; i++) {
                          $('#decision').append($('<option>', {
                                                      value: data[i].id,
                                                      text: data[i].name
                                                  })).material_select();
                        }

                        }else{
                            alert(data);
                        }
                },
                timeout:10000
        });                         
    }); //end of programs ajax call for decision plans
     
    /* for removing the preloader after loading*/
        $(window).load(function() {
        $("#load_screen").remove();
        });