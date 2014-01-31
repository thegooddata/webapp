               
                $('form').submit(function(e) {
                    e.preventDefault();

                    var $form = $(this),
                        url = $form.attr('action'),
                        id = $form.find("input[name=id]").val(),
                        MERGE0 = $form.find("input[name=MERGE0]").val(),
                        spam = $form.find("input[name=b_c536df10462fb6afe72117895_b5320da781]").val();

                    var data = {
                        id: id,
                        MERGE0: MERGE0,
                        b_c536df10462fb6afe72117895_b5320da781: spam
                    };

                    var posting = $.post(
                            url,
                            data,
                            function(data, status) {
                                var content = $(data).find("#templateBody");
                                $( "#result" ).empty().append( content );
                                //$("#result").empty().append(content);
                            },
                            'html');
                });
