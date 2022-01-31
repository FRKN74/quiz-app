<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} quizi için yeni soru oluştur.</x-slot>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.store',$quiz->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" id=""  rows="5" class="form-control" value="">{{ old('question') }}</textarea>
                </div>
            
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <br>
                    <input type="file" name="image" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1.Cevap</label>
                            <textarea name="answer1" id=""  rows="3" class="form-control" value="">{{ old('answer1') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2.Cevap</label>
                            <textarea name="answer2" id=""  rows="3" class="form-control" value="">{{ old('answer2') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3.Cevap</label>
                            <textarea name="answer3" id=""  rows="3" class="form-control" value="">{{ old('answer3') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4.Cevap</label>
                            <textarea name="answer4" id=""  rows="3" class="form-control" value="">{{ old('answer4') }}</textarea>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Doğru cevabı belirtiniz</label>
                    <select name="correct_answer" class="form-control" >
                        <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1.Cevap</option>
                        <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2.Cevap</option>
                        <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3.Cevap</option>
                        <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4.Cevap</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-2 w-100">Soruyu oluştur</button>
                </div>
            
            </form>
        </div>
    </div>


</x-app-layout>