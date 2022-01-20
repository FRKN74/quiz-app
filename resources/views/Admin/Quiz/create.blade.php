<x-app-layout>
    <x-slot name="header">Quiz oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <br>
                    <textarea name="description" id=""  rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="finished-check">
                    <label>Bitiş Tarihi olacak mı?</label>
                </div>
                <div id="date-input" style="display: none"  class="form-group" >
                    <label>Bitiş Tarihi </label>
                    <input  type="datetime-local" name="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-2 w-100">Quiz oluştur</button>
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