<x-app-layout>
    <x-slot name="header">Quiz güncelle</x-slot>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.update',$quiz->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div>
            
                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <br>
                    <textarea name="description" id=""  rows="5" class="form-control" >{{ $quiz->description }}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" @if($quiz->finished_at) checked @endif id="finished-check">
                    <label>Bitiş Tarihi olacak mı?</label>
                </div>
                <div id="date-input" @if(!$quiz->finished_at) style="display: none"  @endif  class="form-group" >
                    <label>Bitiş Tarihi </label>
                    <input  type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i',strtotime($quiz->finished_at ))}}" @endif>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-2 w-100">Tamamla</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script>

            $('#finished-check').change(function(){
                if($('#finished-check').is(':checked')){
                    $('#date-input').show(500);
                }else{
                    $('#date-input').hide(500);
                }
            })
            

        </script>
    </x-slot>
</x-app-layout>