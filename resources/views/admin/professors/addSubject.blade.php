@extends('masterPage')


@section('content')


    <h2 class="text-center">Add subject to professor {{ $professor->first_name.' '.$professor->last_name }}</h2><br><br>


    @include('errors.formErrors')


    <form action="{{ route('store.subjects',$professor->id) }}" method="POST">

        {{ csrf_field() }}

        <div>
            <input type="hidden" name="professor_id" id="professor" value="{{ $professor->id }}" />
        </div>
        <div class="row form-group select">

            <label class="col-sm-2"  for="name">Subjecte:</label>
            <select  name='subject_id' id='subject'  class='form-control col-sm-10'>

                <option value="" selected disabled hidden>Choose here</option>
                @foreach($subjects as $subject)    
                    <option   value='{{ $subject->id }}'>{{ $subject->name }}</option>
                @endforeach

            </select>

        </div>
        <div class="row form-group razredi">

            @foreach($classrooms as $class)

            <div class="col-sm-2" >School class:</div> 
            <div class="col-sm-10">
                <input class="form-check-input" type="checkbox" name="classes[]"  value="{{ $class->id}}" id="class">
                <label class="form-check-label" for="class">
                    {{ $class->class_name }}
                </label>
            </div>

            @endforeach

        </div>
        <div class="form-group text-center">
            <input type="submit" name="submit" value="Add Subject" class="btn btn-outline-primary"  />
        </div>
    </form>

@stop



@section('script')


<script type="text/javascript">


$(document).ready(function() {

 
    $("#subject").change(function(){
        
        var subject = $(this).val();
        var professor = $("#professor").val();
        
     
  
        $.ajax({
               method: 'get',
               url:"{{ url('/sentAjax') }}",
              // dataType: "json",
               data: {'subject': subject,'professor': professor},   
               success:function(classes){
                   
               
               if(!$.isEmptyObject(classes)){
                 
                  $(".razredi").children().empty();
                  $(".razredi").children().remove("p");
                   
                    var formFields = [];
                  
                    $.each( classes, function( key, value ) {

                            formField = "<div class='col-sm-2'>School class:</div>"+
                                          "<div class='col-sm-10'>"+
                                            "<input class='form-check-inpute' type='checkbox' name='classes[]' value='"+  value.id  +"' id='class' >"+
                                            "<label class='form-check-label' for='class'>"+ "&nbsp" + value.class_name + "<label>"+
                                        "</div>";
                                
                        formFields.push(formField);
                    });  
                   
                    $(".razredi").append(formFields);
                    
                }else{
                
                    $(".razredi").append().html("<p class='alert alert-primary col-sm-12'>There are no free classes for this subject</p>");
                
                }
            
               }
             
            });
      

    });
    
});

</script>

    
@stop
