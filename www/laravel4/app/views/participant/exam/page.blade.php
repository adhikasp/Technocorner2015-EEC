@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>
      BABAK PENYISIHAN EEC 2015 <br>
      <small>Mata pelajaran {{ ucwords((Input::get('mapel')? Input::get('mapel') : 'matematika')) }}</small>
    </h1>


    @if (App::environment() == 'local')
      <h3>DEVELOP MODE ONLY</h3>
      <h3>Todo:</h3>
      <ul>
        <li>Nomor soal masih pake inline style agar rata kanan</li>
        <li>Perbaiki radio button, sekarang kalau tulisannya panjaang nanti jadi gak rata sama radionya</li>
        <li>[v] Disable kirim form saat tekan <kbd>[Enter]</kbd></li>
      </ul>
      @if(Session::has('message'))
        <h3>Jawaban sudah tersiman di DB</h3>
      @endif
    @endif
    <hr/>

    {{ Form::open([
      'route' => 'participant.exam.showConfirmFinish',
      'class' => 'exam-paper',
		  'id' => (Input::has('mapel')? Input::get('mapel') : 'matematika') . '-paper',
      'data-subjectId' => $subject_id
    ]) }}

      {{ Form::hidden('exam_id', $exam_id, ['id' => 'exam_id']) }}

      <?php $no = 1 ?>
      {{-- Get all the question and chunk it in group of 5 #explaining what code already does, what a bad comment --}}
      {{-- So we can make <hr> separator every 5 question --}}
      @foreach (array_chunk($questions->all(), 5) as $question_group)
        @foreach ($question_group as $q)
          <div class="row question" id="{{ $q->id }}">
            <div class="col-sm-1" style="text-align:right"> {{-- BEWARE: inline styles --}}
              <label>{{ $no++ }}.</label>
            </div>

            <div class="col-sm-11">
              <p>
                {{ $q->getQuestion() }}
				<!-- <br/>
                   Id soal : {{ $q->id }} -->
              </p>

			  @if ($q->image)
                <div class="question-image">
                  <img src="{{ $q->image }}" alt="Pertanyaan untuk soal {{ $q->id }}">
                </div>
			  @endif

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'A', Input::old( $q->id . '-ch'), ['class' => 'choice-radio']) }}
                  <strong>A.</strong> {{ $q->getChoice('A') }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'B', Input::old( $q->id . '-ch'), ['class' => 'choice-radio'] ) }}
                  <strong>B.</strong> {{ $q->getChoice('B') }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'C', Input::old( $q->id . '-ch'), ['class' => 'choice-radio'] ) }}
                  <strong>C.</strong> {{ $q->getChoice('C') }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'D', Input::old( $q->id . '-ch'), ['class' => 'choice-radio'] ) }}
                  <strong>D.</strong> {{ $q->getChoice('D') }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'E', Input::old( $q->id . '-ch'), ['class' => 'choice-radio'] ) }}
                  <strong>E.</strong> {{ $q->getChoice('E') }}
                </label>
              </div>
            </div>
          </div>

        @endforeach
        <hr>
      @endforeach

      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <nav class="paging" style="text-align: center">
            <div class="pagination pagination-lg">
              @foreach ($subject_list as $subject)
                <li {{ (Input::get('mapel')? Input::get('mapel') : 'matematika') == strtolower($subject) ? 'class="active"' : null }}>
                  {{ link_to_route('participant.exam.page', $subject, ['mapel' => strtolower($subject)], ['class' => 'subject-link']) }}
                </li>
              @endforeach
            </div>
          </nav>
        </div>
      </div>

      {{ Form::submit('Selesai', ['class' => 'col-sm-offset-4 col-sm-4 btn btn-success', 'id' => 'submit-answer'])}}

      {{ Form::close() }}

	  <div style="clear: both"></div>
	  <hr/>
      <div class="paper-footer col-sm-12">
		<small>(c) Technocorner</small>
      </div>
  </main>

@stop

@section('script')
  <script src="/script/exam.min.js"></script>
@stop
