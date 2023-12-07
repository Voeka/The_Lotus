


        $(document).ready(function() {
            $("#phone").mask("+7 (999) 999-99-99");
          });
        
          $('.Exit').click(function(){
            
          })

          $('#lern').click(function(){
            window.location.href ='Swamp/index.html';
          })

          $('#this').click(function(){
            window.location.href ='../index.php';
          })

          $('#Lotos').click(function(){
            window.location.href ='../index.php';
          })

        function changeButttons(){
            $('#login').toggleClass('hiden');
            $('#reg').toggleClass('hiden');
            $('#lich').toggleClass('hiden');
            $('.log_in').css('display', 'none');
            $('.forgotonn').css('display', 'none');
            $('.register').css('display', 'none');
            $('.darkness').css('display', 'none')
        }

        function cometolight(){
            window.location.href = "Kabinet.php";
        }

        function comeout(){
            window.location.href = "?logout"
        }

        function admin(){
            window.location.href = "admin.php"
        }
        
        
        function registration(){
            $('.register').css('display', 'block');
        }
        
        function LogingIN(){
            $('.log_in').css('display', 'block');
        }
        
        $('#Forgote').click(function(){
            $('.log_in').css('display', 'none');
            $('.forgotonn').css('display', 'block');
        })


        $('.changePassword').click(function(){
            window.location.href="changepassword.php";
        })

        
        
        function DarkUp(){
            // console.log('evil!');
            $('.darkness').css(
                'display', 'flex'
        )
        }
        
         $('.Exit').click(function(){
            $('.log_in').css('display', 'none');
            $('.forgotonn').css('display', 'none');
            $('.register').css('display', 'none');
            $('.darkness').css('display', 'none')
         })



        //  Fotter
                 
          $('#VK').click(function(){
            window.location.href = 'https://vk.com/tproger';
            console.log('ayay');
          });

          $('#TG').click(function(){
            window.location.href = 'https://t.me/Kirill_Golomidov';
            console.log('ayay');
          });

          $('#Whatsapp').click(function(){
            window.location.href = 'https://chat.whatsapp.com/CX0xqdLltnJCMXDayYHbtT';
            console.log('ayay');
          });

          $('#Disc').click(function(){
            window.location.href = 'https://discord.com/servers/chill-heaven-social-anime-egirls-emotes-emojis-fun-701459880992702615';
            console.log('ayay');
          });


          
        
        var a = 1;

        $('#profilebutton').click(function(){


                
            $('.submit').removeAttr('disabled');
            $('.submit').toggleClass('readychange');

            $('#profilebutton').toggleClass('changeprofile').toggleClass('stopchanging');

            if($("#profilebutton").hasClass('changeprofile')){
                $('.kabinItems').children('input').attr('disabled', true);
            } else{
                $('.kabinItems').children('input').removeAttr('disabled');
            }
        })


        



       
            
        $('#restart').click(function(){
            window.location.href ="./Test.php";
        })
            

        $('.leftarrow').click(function(){
            a+=1;
            if(a==4){
                a=1;
            }
            // console.log(a);
            if(a==1){
                $('.r3').css('display','none');
                $('.r2').css('display','none');
                $('.r1').css('display','block');
                // console.log(a);
            }

        if(a==2){
                $('.r1').css('display','none');
                $('.r2').css('display','block');
                $('.r3').css('display','none');
                // console.log(a);
            }
            
            if(a==3){
                $('.r1').css('display','none');
                $('.r2').css('display','none');
                $('.r3').css('display','block');
                // console.log(a);
            }
        })

        $('.rightarrow').click(function(){
            a-=1;
            // console.log(a);
            if(a<1){
                a=3;
                // console.log(a);
            }
            if(a==1){
                $('.r3').css('display','none');
                $('.r2').css('display','none');
                $('.r1').css('display','block');
                // console.log(a);
            }

            if(a==2){
                $('.r1').css('display','none');
                $('.r2').css('display','block');
                $('.r3').css('display','none');
                // console.log(a);
            }
            
            if(a==3){
                $('.r1').css('display','none');
                $('.r2').css('display','none');
                $('.r3').css('display','block');
                // console.log(a);
            }
        })

        
        $('.butttton').click(function(){
            $('.testone').css('display','none');
            $('.testotwo').css('display','flex');
        })
        $('.nexttwo').click(function(){
            $('.testotwo').css('display','none');
            $('.testothreo').css('display','flex');
        })
        $('.nextthree').click(function(){
            $('.testothreo').css('display','none');
            $('.testofour').css('display','flex');
        })
        $('.nextfour').click(function(){
            $('.testofour').css('display','none');
            $('.testofive').css('display','flex');
        })
        $('.nextfive').click(function(){
            $('.testofive').css('display','none');
            $('.testosix').css('display','flex');
        })
        $('.nextsix').click(function(){
            $('.testosix').css('display','none');
            $('.testogg').css('display','flex');
        })

        // Perehod

        
        // $('.SUBME').click(function(){
        //     if($('#Names').val()==''){
        //         alert('Введите имя!');
        //     }
        //     if($('#Reviu').val()==''){
        //         alert('Введите отзыв!');
        //     }

        //     if(!$('#Reviu').val()=='' && !$('#Names').val()==''){
        //         $('.reviuvs').append( '<div class="rev"> <img src="image/UnLoggined.png" alt=""> <p class="accent">'+ $("#Names").val() + '</p><p>' + $("#Reviu").val() + '</p></div>')
        //         console.log('add')
        //     }
        // })










        // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $(document).ready(function(){
            $('.Less').find('table').hide();
            $('.UROKS').hide();
            $('.Urok1').hide();
            $('.Urok2').hide();
            $('.Urok3').hide();
            $('.Urok4').hide();
            $('.Urok5').hide();
            $('.Urok6').hide();
            $('.Urok7').hide();
            $('.Urok8').hide();
            $('.Urok9').hide();
            $('.Urok10').hide();
            $('.GGres').hide();
            $('.ggEXIT').hide();
        })
        
        var NomUrok = 1;
        var a =0;
        var exps=0;

        $('.lessonInfo').click(function(){
            $(this).parent().find('table').show();
            $('.Le').find('table').not($(this).parent().find('table')).hide();
        });

        $('.lessons p').click(function(){
            $('.Less').find('table').hide();
            $('.UROKS').hide();
            $('.Urok1').hide();
            $('.Urok2').hide();
            $('.Urok3').hide();
            $('.Urok4').hide();
            $('.Urok5').hide();
            $('.Urok6').hide();
            $('.Urok7').hide();
            $('.Urok8').hide();
            $('.Urok9').hide();
            $('.Urok10').hide();
            $('.GGres').hide();
            $('.ggEXIT').hide();
            $('#NomerUR').show();
            exps=0;
            NomUrok = 1;
            $('#NomerUR').text(NomUrok+'/10');
            $('main,nav').hide();
            $('.UROKS').show();
            $('.UROKS').find('.Urok'+NomUrok).show();
            
        })

        // Игра
        

        function UrokNext(){
            console.log(NomUrok);
            $('.UROKS').find('.Urok'+NomUrok).hide();
            NomUrok+=1;
            a=0;
            $('.UROKS').find('.Urok'+NomUrok).show();
            console.log(NomUrok);
            console.log($('.Urok'+NomUrok))
            $('#NomerUR').text(NomUrok+'/10');

        }

        function RigthOrNo(){
            a=1;
            if($('.Urok'+NomUrok).find('.Verno').hasClass('Selecteeed')){
                console.log('Yep');
                $('.Urok'+NomUrok).find('.BoardColor').toggleClass('green');

                $('.Urok'+NomUrok).find('#ResultThis').text('Правильно!');
                
                $('.Urok'+NomUrok).find('.ReadyNext').text('Далее');
                $('.Urok'+NomUrok).find('button').addClass('NeextBoy').toggleClass('ReadyNext');

                exps+=1;


            }else{
                $('.Urok'+NomUrok).find('.BoardColor').toggleClass('red');
                $('.Urok'+NomUrok).find('#ResultThis').text('Не правильно!');

                $('.Urok'+NomUrok).find('.ReadyNext').text('Далее');
                $('.Urok'+NomUrok).find('button').addClass('NeextBoy').toggleClass('ReadyNext');


            }
        }

        $('.variants').find('div').click(function(){
            if(a==0){
                $(this).toggleClass('Selecteeed');
                $('.variants').find('div').not(this).removeClass('Selecteeed');
            } else{

            }
            
        })


        function GG(){
            $('.Urok10').hide();
            $('.GGres').show();
            $('.ggEXIT').show();
            $('#pravotv').text(exps+'/10 правильных ответов');
            $('#moneyplus').text('+'+exps*2);
            $('#XP').text('+'+exps+' XP');
            $('#NomerUR').hide();
        }

        $('.ggEXIT').click(function(){
            $('.UROKS').hide();
            $('main,nav').show();
        })

        

        $('.UROKS').click(function(){
            
                if($('.Urok'+NomUrok).find('div').hasClass('Selecteeed')){
                    $('.Urok'+NomUrok).find('button').addClass('ReadyNext');
                } else{
                    $('.Urok'+NomUrok).find('button').removeClass('ReadyNext');
                }
                
                
                    $('.Urok'+NomUrok).find('.ReadyNext').click(function(){
                        console.log('NextUrok');
                        RigthOrNo();
                    })
                
                

                if(NomUrok<10){
                    $('.Urok'+NomUrok).find('.NeextBoy').click(function(){
                        console.log('NextUrok');
                        UrokNext();
                    })
                } else{
                    $('.Urok'+NomUrok).find('.NeextBoy').click(function(){
                        GG();
                    })
                }
    
                
            
            

        })

        



        