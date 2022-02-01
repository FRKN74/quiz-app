<x-app-layout>
    <x-slot name="header">{{ $question->question }} quizi için yeni soru oluştur.</x-slot>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.update',[$question->quiz_id,$question->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" id=""  rows="5" class="form-control" value="">{{ $question->question }}</textarea>
                </div>
            
                <div class="form-group">
                    @if ($question->image)
                    <a href="{{ asset($question->image) }}" target="_blank">
                        <img src="{{ asset($question->image) }}" class="mt-2" alt="resim yok" width="200px" height="200px" srcset="">
                    </a>
                    @endif
                    <label>Fotoğraf</label>
                    <br>
                    <input type="file" name="image" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1.Cevap</label>
                            <textarea name="answer1" id=""  rows="3" class="form-control" value="">{{ $question->answer1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2.Cevap</label>
                            <textarea name="answer2" id=""  rows="3" class="form-control" value="">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3.Cevap</label>
                            <textarea name="answer3" id=""  rows="3" class="form-control" value="">{{ $question->answer3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4.Cevap</label>
                            <textarea name="answer4" id=""  rows="3" class="form-control" value="">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Doğru cevabı belirtiniz</label>
                    <select name="correct_answer" class="form-control" >
                        <option @if($question->correct_answer) ==='answer1') selected @endif value="answer1">1.Cevap</option>
                        <option @if($question->correct_answer) ==='answer2') selected @endif value="answer2">2.Cevap</option>
                        <option @if($question->correct_answer) ==='answer3') selected @endif value="answer3">3.Cevap</option>
                        <option @if($question->correct_answer) ==='answer4') selected @endif value="answer4">4.Cevap</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-2 w-100">Soru güncellendi</button>
                </div>
            
            </form>
        </div>
    </div>


</x-app-layout>