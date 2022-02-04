<x-app-layout>
    <x-slot name="header">Anasayfa</x-slot>

    <div class="row">
        <div class="col-md-8">
            @foreach ($quizzes as $quiz)
                <div class="list-group mb-3 bg-dark border-primary">
                    <a href="{{  route('quiz_detail',$quiz->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start  bg-dark border-primary">
                        <div class="d-flex w-100 justify-content-between  bg-dark border-primary text-white">
                            <h5 class="mb-1 bg-dark border-primary text-white">{{ $quiz->title }}</h5>
                            <small>{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans()." bitiyor" : "Bitiş tarihi yok" }}</small>
                        </div>
                        <p class="mb-1 bg-dark border-primary text-white">{{ Str::limit($quiz->description,10) }}</p>
                        <small class="bg-dark border-primary text-white">{{ $quiz->questions_count }} Soru </small>
                    </a>
                </div>
            @endforeach
            {{ $quizzes->links() }}
        </div>
        <div class="col-md-4">
            <div class="card bg-dark border-primary text-white">
                <div class="card-header">
                    Quiz Sonuçlarım
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($results as $result )
                        <a href="{{ route('quiz_detail',$result->quiz->slug) }}" class="btn btn-dark">
                            <li class="list-group-item bg-dark border-primary text-white">
                                {{ $result->quiz->title }}
                                <strong class="badge badge-success float-end">{{ $result->point }}</strong>
                            
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
