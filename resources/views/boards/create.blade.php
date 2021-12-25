@extends('layouts.app')

@section('title', 'ボード作成')

@section('content')
<div id="range">

  <form class="" action="{{route('boards.store')}}" method="post">
  @csrf
  @include('components.form-error')
    <input type="text" name="title" value="">
    <input type="hidden" name="id" value="{{$id}}">
    <div class="board-container">
      <table>
        <tr>
          <th>LFO</th>
          <th>DCO</th>
          <th>HPF</th>
          <th>VCF</th>
          <th>VCA</th>
          <th>ENV</th>
        </tr>
        <tr>
          <td>
            <datalist id="tickmarks">
                  <option value="0"></option>
                  <option value="1"></option>
                  <option value="2"></option>
                  <option value="3"></option>
                  <option value="4"></option>
                  <option value="5"></option>
                  <option value="6"></option>
                  <option value="7"></option>
                  <option value="8"></option>
                  <option value="9"></option>
                  <option value="10"></option>
                </datalist>
            <div class="slider-wrapper">
              @{{rate}}
              <input type="range"  value="{{old('rate')}}" min="0" max="10" name="rate" v-model="rate" list="tickmarks">
            </div>
            <div class="slider-wrapper">
              @{{delaytime}}
              <input type="range"  value="0" min="0" max="10" name="delaytime" v-model="delaytime" list="tickmarks">
            </div>
          </td>
          <td>
            <div class="dco">
              <div class="radio">
                <div class="items"><input type="radio" name="range" value="16" checked><label>16</label></div>
                <div class="items"><input type="radio" name="range" value="8"><label>8</label></div>
                <div class="items"><input type="radio" name="range" value="4"><label>4</label></div>
              </div>
              <div class="slider-wrapper">
                @{{lfo}}
                <input type="range"  value="0" min="0" max="10" name="lfo" v-model="lfo" list="tickmarks">
              </div>
              <div class="slider-wrapper">
                @{{pwm}}
                <input type="range"  value="0" min="0" max="10" name="pwm" v-model="pwm" list="tickmarks">
              </div>
              <div class="radio">
                <label><img src="/images/wave1.png" alt="wave1" class="env-img"></label>
                <div class="items"><input type="radio" name="env" value="16" checked></div>
                <label><img src="/images/wave2.png" alt="wave2" class="env-img"></label>
                <div class="items"><input type="radio" name="env" value="8"></div>
                <input type="hidden" name="subb" value="0">
                <div class="items"><input type="checkbox" name="subb" value="1"></div>
              </div>
              <div class="slider-wrapper">
                @{{sub}}
                <input type="range"  value="0" min="0" max="10" name="sub" v-model="sub" list="tickmarks">
              </div>
              <div class="slider-wrapper">
                @{{noise}}
                <input type="range"  value="0" min="0" max="10" name="noise" v-model="noise" list="tickmarks">
              </div>
            </div>
          </td>
          <td>
            <div class="slider-wrapper">
              @{{freq}}
              <input type="range"  value="0" min="0" max="10" name="freq" v-model="freq" list="tickmarks">
            </div>
         </td>
         <td>
            <div class="vcf">
              <div class="slider-wrapper">
                @{{vfreq}}
                  <input type="range"  value="0" min="0" max="10" name="vfreq" v-model="vfreq" list="tickmarks">
            </div>
            <div class="slider-wrapper">
              @{{res}}
              <input type="range"  value="0" min="0" max="10" name="res" v-model="res" list="tickmarks">
            </div>
            <div class="check">
              <img src="/images/filter1.png" alt="wave1" class="env-img">
              <br>
              <input type="hidden" name="envb" value="0">
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="envb" value="1">
                  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
              </div>
              <img src="/images/filter2.png" alt="wave2" class="env-img">
            </div>
            <br>
            <div class="slider-wrapper">
              @{{venv}}
              <input type="range"  value="0" min="0" max="10" name="venv" v-model="venv" list="tickmarks">
            </div>
            <div class="slider-wrapper">
              @{{vlfo}}
              <input type="range"  value="0" min="0" max="10" name="vlfo" v-model="vlfo" list="tickmarks">
            </div>
            <div class="slider-wrapper">
              @{{kybd}}
              <input type="range"  value="0" min="0" max="10" name="kybd" v-model="kybd" list="tickmarks">
            </div>
          </div>
        </td>
        <td>
          <div class="vca">
            <div class="check">
              <img src="/images/filter1.png" alt="wave1" class="env-img">
              <br>
              <input type="hidden" name="levelb" value="0">
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="levelb" value="1">
                  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
              </div>
              <img src="/images/filter3.png" alt="wave1" class="env-img">
            </div>
            <br>
            <div class="slider-wrapper">
              @{{level}}
              <input type="range"  value="0" min="0" max="10" name="level" v-model="level" list="tickmarks">
            </div>
          </div>
        </td>
        <td>
          <div class="slider-wrapper">
            @{{a}}
            <input type="range"  value="0" min="0" max="10" name="a" v-model="a" list="tickmarks">
          </div>
          <div class="slider-wrapper">
            @{{d}}
            <input type="range"  value="0" min="0" max="10" name="d" v-model="d" list="tickmarks">
          </div>
          <div class="slider-wrapper">
            @{{s}}
            <input type="range"  value="0" min="0" max="10" name="s" v-model="s" list="tickmarks">
          </div>
          <div class="slider-wrapper">
            @{{r}}
            <input type="range"  value="0" min="0" max="10" name="r" v-model="r" list="tickmarks">
          </div>
        </td>
     </tr>
  </table>
  </div>
    <input type="submit" name="" class="create" value="Add">
  </form>
</div>
@endsection
