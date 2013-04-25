@extends('template')

@section('conteudo')
    
    <ul style="list-style: none;">
        @foreach ($tasks as $task)
            <li class="task">
                @if ($task->status)
                    <span class="label label-success">{{ $task->titulo }}</span>
                @else
                    <label data-task-id='{{ $task->id }}'>
                        <input type="checkbox" />
                        {{ $task->titulo }}
                    </label>
                @endif
            </li>
        @endforeach
    </ul>
@stop


@section('custom_script')
    <script language="javascript">
        $(document).ready( function() {

            $('li label input').on('change', function(){
                var task_id = $(this).parent().data('task-id');
                var li = $(this).parent().parent();

                //ajax post request
                $.post(
                    "/task/check",
                    {task_id: task_id},
                    function(data) {
                        //callback do ajax request
                        if (data.status == true) {
                            li.html("<span class='label label-success'>"+data.titulo+"</span>");
                        }
                    }
                );
            });
        });
    </script>
@stop