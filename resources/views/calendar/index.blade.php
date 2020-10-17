@extends('layouts.main')
@section('content')
    <div class="flex flex-wrap h-screen p-4">
        <div class="xl:w-1/5 w-full">
            @include('calendar.form')
        </div>
        <div class="xl:w-4/5 w-full">
            @include('calendar.calendar')
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('document').ready(function() {
            fetchEvent();
            $('#datepicker_to').datepicker();

            $('#datepicker_from').datepicker();
         
            $('.submit-btn ').on('click', function(e) {
                e.preventDefault();
                let data = $('.form-event').serialize();
                saveEvent(data);
            });
        });
        assignData = (data) => {
            $('#event').val(data['event_name']);
            $('#datepicker_to').val(data['event_to']);
            $('#datepicker_from').val(data['event_from']);
            let res = data['daysOfWeek'].split(",");
            for(let i=0; i<res.length; i++) { 
                $('.day_'+res[i]).prop( "checked", true );
            }
        }
        fetchEvent = () => {
            $.ajax({
                url: '{{ route("events.index") }}',
                type: "GET",
                success: function(response) {
                    assignData(response);
                    let data = getMarkDays(response);
                    calendarGenerator(data, response['event_name']);
                },
            });
          
        }
        saveEvent = (data) => {
            $.ajax({
                url: '{{ route("events.store") }}',
                type: "POST",
                data: data,
                success: function(response) {
                    fetchEvent();
                    toastr.success('Successfully Saved');
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }
        convertStringToInt = (data) => {
            let myArray = [];
           
            let res = data.split(",");
          
            for(let i=0; i<res.length; i++) { 
                myArray.push(parseInt(res[i]));
            }
            return myArray;
        }
        getMarkDays = (data) => {
            let stringData = [];
       
            let start = new Date(data['event_from']);
            let end = new Date(data['event_to']);
            
            let newdaysOfWeek = convertStringToInt(data['daysOfWeek']);
           
            for (let day = start; start <= end; start.setDate(start.getDate() + 1)) {
                for(let x = 0; x < newdaysOfWeek.length; x++ )
                {
                    if(newdaysOfWeek[x] === moment(start).day())
                    {
                        stringData.push(moment(day).format('YYYY-MM-D') + "-" + moment(day).day());
                    }
                }
               
                
            
            }

            return stringData;
        }
        calendarGenerator = (data, event) => {
            $(".calendar-row").empty();
            $(".title-month").empty();
            let now = moment();
            let month = moment(now).month() + 1; // + 1 Because 0 January - 11 December
            let year = now.year();

            let startOfMonth = moment(now).startOf('month');
            let endOfMonth = moment(now).endOf('month');
            let dayWord;
            
            $(".title-month").append(now.format("MMMM") + '' + now.format('YYYY'));
           
            for(let i = startOfMonth.date(); i <= endOfMonth.date();i++) {
               
                switch (startOfMonth.day()) {
                    case 0:
                        dayWord = "Sun";
                        break;
                    case 1:
                        dayWord = "Mon";
                         break;
                    case 2:
                        dayWord = "Tue";
                        break;
                    case 3:
                        dayWord = "Wed";
                        break;
                    case 4:
                        dayWord = "Thu";
                        break;
                    case 5:
                        dayWord = "Fri";
                        break;
                    case 6:
                        dayWord = "Sat";
                        break;
                    default:
                         console.log("day error");
                }
                $(".calendar-row").append('<div class="px-6 py-2 border-b border-gray-500" id="'+ year + "-" + month + "-" + i + "-" + startOfMonth.day() +'">'+ i +'-'+ dayWord + '</div>');
              
              
                // $(".calendar-content").append('<div class="p-2 border-b border-black" id="'+ year + "-" + month + "-" + i + "-" + startOfMonth.day() +'">-</div>');
                startOfMonth.add(1,'days');



               
            }
            data.forEach(function(el){
                $("#" + el).addClass("bg-green-300 text-white").append('<span class="pl-4">'+event+'</span>');
            });
    }
    </script>
@endsection