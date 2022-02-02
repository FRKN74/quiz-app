<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card ">
        <div class="card-header text-center bg-dark text-white border-primary">
            {{ $quiz->title }}
        </div>
        <div class="card-body bg-dark text-white ">
            <p class="card-text bg-dark text-white ">

                <form action="{{ route('quiz.result',$quiz->slug) }}" method="POST">
                    @csrf
                @foreach ($quiz->questions as $question)

                <strong> <small class="badge badge-info">{{ $loop->iteration }}. </small> {{ $question->question }}</strong>
                @if ($question->image)
                    <img src="{{ asset($question->image) }}"  alt="resim yok" class="img-responsive mt-5 ml-5 w-50">
                @endif
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    
                    <input type="radio" id="quiz-{{ $question->id }}-1" name="{{ $question->id }}" class="custom-control-input" value="answer1" required>
                    <label class="custom-control-label" for="quiz-{{ $question->id }}-1">{{ $question->answer1 }}</label>
                </div>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    
                    <input type="radio" id="quiz-{{ $question->id }}-2" name="{{ $question->id }}" class="custom-control-input" value="answer2" required>
                    <label class="custom-control-label" for="quiz-{{ $question->id }}-2">{{ $question->answer2 }}</label>
                </div>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    
                    <input type="radio" id="quiz-{{ $question->id }}-3" name="{{ $question->id }}" class="custom-control-input" value="answer3" required>
                    <label class="custom-control-label" for="quiz-{{ $question->id }}-3">{{ $question->answer3 }}</label>
                </div>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    
                    <input type="radio" id="quiz-{{ $question->id }}-4" name="{{ $question->id }}" class="custom-control-input" value="answer4" required>
                    <label class="custom-control-label" for="quiz-{{ $question->id }}-4">{{ $question->answer4 }}</label>
                </div>
                @if(!$loop->last)
                    <hr>
                @endif
                @endforeach
                <button type="submit" class="btn btn-success btn-block mt-5">Sınavı bitir</button>
            </form>
            </p>
        </div>
    </div>
</x-app-layout>
