<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card ">
        <div class="card-header text-center bg-dark text-white border-primary">
            {{ $quiz->title }}
        </div>
        <div class="card-body bg-dark text-white ">
            <p class="card-text bg-dark text-white ">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                Soru Sayısı
                                <span>{{ $quiz->questions_count }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                Son katılım tarihi
                                <span title="{{ $quiz->finished_at }}">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "-"}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                Katılımcı
                            <span >14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-primary">
                                Ortalama Puan
                                <span >2</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        {{ $quiz->description }}
                        
                    </div>
                </div>
                
            </p>
            <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary d-block mt-5">Quize katıl</a>
        </div>
        <div class="card-footer text-muted text-center bg-dark text-white border-primary">
            {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : "Bitiş tarihi yok"}} 
        </div>
    </div>
</x-app-layout>
