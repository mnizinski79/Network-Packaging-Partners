 jQuery(function($)
        {
           
          $('input:radio').change(
              function(){
                  alert('changed');   
              }
          ); 
          $('.r-ex2').change(function(){
            alert("WE CHANGED");
            $(this).closest('table').siblings('.no-cols').val($(this).val());
            $(this).closest('table').siblings('.npp-user-msg').css('display','none');
            if ($(this).val()<=6){ //these are text areas so we need to display wysiwygs
              console.log('wysiwyg '+$(this).val());
              if ($(this).val() == 1){
                $('#customEditor-0').css('display','block');
                $('#customEditor-1').css('display','none');
                $('#customEditor-2').css('display','none');
                $('#customEditor-3').css('display','none');
              } else if (parseInt($(this).val()) == 2 || parseInt($(this).val()) == 5 || parseInt($(this).val()) == 6){
                $('#customEditor-0').css('display','block');
                $('#customEditor-1').css('display','block');
                $('#customEditor-2').css('display','none');
                $('#customEditor-3').css('display','none');
              }else if (parseInt($(this).val()) == 3){
                //console.log("we should be showing 3!!");
                $('#customEditor-0').css('display','block');
                $('#customEditor-1').css('display','block');
                $('#customEditor-2').css('display','block');
                $('#customEditor-3').css('display','none');
              }else if (parseInt($(this).val()) ==4){
                $('#customEditor-0').css('display','block');
                $('#customEditor-1').css('display','block');
                $('#customEditor-2').css('display','block');
                $('#customEditor-3').css('display','block');
              }
            }else {
                $('#customEditor-0').css('display','none');
                $('#customEditor-1').css('display','none');
                $('#customEditor-2').css('display','none');
                $('#customEditor-3').css('display','none');

                //Display the appropriate message based on what the user selected
                switch ($(this).val()) { 
                case '7': 
                    $(this).closest('table').siblings('.npp-user-msg').html("You have selected to show the 'Related Content' carousel.");
                    break;
                case '8': 
                    $(this).closest('table').siblings('.npp-user-msg').html("You have selected to show the 'Child Pages' grid.");
                    break;
                case '9': 
                    $(this).closest('table').siblings('.npp-user-msg').html("You have selected to show the 'Marketing Message' component.");
                    break;      
                case '10': 
                    $(this).closest('table').siblings('.npp-user-msg').html("You have selected to show the 'Find Positions' component.");
                    break;
                case '11': 
                    $(this).closest('table').siblings('.npp-user-msg').html("You have selected to show the 'Become a Partner' component.");
                   break;
                default:
                    alert('Nobody Wins!');
                }
                $(this).closest('table').siblings('.npp-user-msg').css('display','block');
            }
          });
          

          $.each($('.no-cols'), function(index, value){        
            var no_cols = $(this).val();
            
            console.log("no_cols: "+no_cols);
             if (no_cols == 2){
                $(this).siblings('.group-inside').find('#customEditor-1').css('display','block');
              }
              else if (no_cols > 2){
                $(this).siblings('.group-inside').find('#customEditor-1').css('display','block');
                $(this).siblings('.group-inside').find('#customEditor-2').css('display','block');
              }else {
                $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
              }

              switch ($(this).val()) { 
            case '1':
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
              break;
            case '2':
            case '5':
            case '6':
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
              break;
            case '3':
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
              break;
            case '4':
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','block');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','block');
               break;
            case '7': 
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
                  $(this).next().html("You have selected to show the 'Related Content' carousel.");
                  $(this).next().css('display','block');
                break;
            case '8': 
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
                  $(this).next().html("You have selected to show the 'Child Pages' grid.");
                  $(this).next().css('display','block');
                break;
            case '9': 
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
                  $(this).next().html("You have selected to show the 'Marketing Message' component.");
                  $(this).next().css('display','block');
                break;      
            case '10': 
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
                  $(this).next().html("You have selected to show the 'Find Positions' component.");
                  $(this).next().css('display','block');
                break;
            case '11': 
                  $(this).siblings('.group-inside').find('#customEditor-0').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
                  $(this).next().html("You have selected to show the 'Become a Partner' component.");
                  $(this).next().css('display','block');
                break;
            default:
              console.log("we are at default..why?");
                $(this).siblings('.group-inside').find('#customEditor-0').css('display','block');
                 $(this).siblings('.group-inside').find('#customEditor-1').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-2').css('display','none');
                  $(this).siblings('.group-inside').find('#customEditor-3').css('display','none');
                break;
            }
          });
       
           
           
        });