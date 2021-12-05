@extends('layouts.app')

@section('title','board')

@section('content')
  <div class="main">

    <div id="range">
      <form action="{{route('boards.update',['board' => $board])}}" method="post" >
        @method('PUT')
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="board-title">
            <input type="text" name="title" value="{{$board->title}}">
        </div>
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
                  <span>{{$board->rate}}</span>
                  <input type="range"  value="{{$board->rate}}" min="0" max="10" name="rate" list="tickmarks">

                </div>
                <div class="slider-wrapper">
                  <span>{{$board->delaytime}}</span>
                  <input type="range"  value="{{$board->delaytime}}" min="0" max="10" name="delaytime" list="tickmarks">
                </div>
              </td>
              <td>
                <div class="dco">
                  <div class="radio">
                    <div class="items"><input type="radio" name="range" value="16" {{$board->range == 16 ? 'checked':''}}><label>16</label></div>
                    <div class="items"><input type="radio" name="range" value="8" {{$board->range == 8 ? 'checked':''}}><label>8</label></div>
                    <div class="items"><input type="radio" name="range" value="4" {{$board->range == 4 ? 'checked':''}}><label>4</label></div>
                  </div>
                  <div class="slider-wrapper">
                    <span>{{$board->lfo}}</span>
                    <input type="range"  value="{{$board->lfo}}" min="0" max="10" name="lfo" list="tickmarks">
                  </div>
                  <div class="slider-wrapper">
                    <span>{{$board->pwm}}</span>
                    <input type="range"  value="{{$board->pwm}}" min="0" max="10" name="pwm" list="tickmarks">
                  </div>
                  <div class="radio">
                    <label><img src="/images/wave1.png" alt="wave1" class="env-img"></label>
                    <div class="items"><input type="radio" name="env" value="16" {{$board->env == 16 ? 'checked':''}}></div>
                    <label><img src="/images/wave2.png" alt="wave2" class="env-img"></label>
                    <div class="items"><input type="radio" name="env" value="8" {{$board->env == 8 ? 'checked':''}}></div>
                    <input type="hidden" name="subb" value="0">
                    <div class="items"><input type="checkbox" name="subb" value="1" {{$board->subb == 1 ? 'checked':''}}></div>
                  </div>
                  <div class="slider-wrapper">
                    <span>{{$board->sub}}</span>
                    <input type="range"  value="{{$board->sub}}" min="0" max="10" name="sub" list="tickmarks">
                  </div>
                  <div class="slider-wrapper">
                    <span>{{$board->noise}}</span>
                    <input type="range"  value="{{$board->noise}}" min="0" max="10" name="noise" list="tickmarks">
                  </div>
                </div>
              </td>
              <td>
                <div class="slider-wrapper">
                  <span>{{$board->freq}}</span>
                  <input type="range"  value="{{$board->freq}}" min="0" max="10" name="freq" list="tickmarks">
                </div>
             </td>
             <td>
                <div class="vcf">
                  <div class="slider-wrapper">
                      <span>{{$board->vfreq}}</span>
                      <input type="range"  value="{{$board->vfreq}}" min="0" max="10" name="vfreq" list="tickmarks">
                </div>
                <div class="slider-wrapper">
                  <span>{{$board->res}}</span>
                  <input type="range"  value="{{$board->res}}" min="0" max="10" name="res" list="tickmarks">
                </div>
                <div class="check">
                  <img src="/images/filter1.png" alt="wave1" class="env-img">
                  <br>
                  <input type="hidden" name="envb" value="0">
                  <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="envb" value="1" {{$board->envb == 1 ? 'checked':''}}>
                      <label class="form-check-label" for="flexSwitchCheckDefault"></label>

                  </div>
                  <img src="/images/filter2.png" alt="wave2" class="env-img">
                </div>
                <br>
                <div class="slider-wrapper">
                  <span>{{$board->venv}}</span>
                  <input type="range"  value="{{$board->venv}}" min="0" max="10" name="venv" list="tickmarks">
                </div>
                <div class="slider-wrapper">
                  <span>{{$board->vlfo}}</span>
                  <input type="range"  value="{{$board->vlfo}}" min="0" max="10" name="vlfo" list="tickmarks">
                </div>
                <div class="slider-wrapper">
                  <span>{{$board->kybd}}</span>
                  <input type="range"  value="{{$board->kybd}}" min="0" max="10" name="kybd" list="tickmarks">
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
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="levelb" value="1" {{$board->levelb == 1 ? 'checked':''}}>
                      <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                  </div>
                  <img src="/images/filter3.png" alt="wave1" class="env-img">
                </div>
                <br>
                <div class="slider-wrapper">
                  <span>{{$board->level}}</span>
                  <input type="range"  value="{{$board->level}}" min="0" max="10" name="level" list="tickmarks">
                </div>
              </div>
            </td>
            <td>
              <div class="slider-wrapper">
                <span>{{$board->a}}</span>
                <input type="range"  value="{{$board->a}}" min="0" max="10" name="a" list="tickmarks">
              </div>
              <div class="slider-wrapper">
                <span>{{$board->d}}</span>
                <input type="range"  value="{{$board->d}}" min="0" max="10" name="d" list="tickmarks">
              </div>
              <div class="slider-wrapper">
                <span>{{$board->s}}</span>
                <input type="range"  value="{{$board->s}}" min="0" max="10" name="s" list="tickmarks">
              </div>
              <div class="slider-wrapper">
                <span>{{$board->r}}</span>
                <input type="range"  value="{{$board->r}}" min="0" max="10" name="r" list="tickmarks">
              </div>
            </td>
         </tr>
      </table>
      </div>
      <input type="hidden" name="user_id" value="{{$board->user_id}}">
      <input type="hidden" name="category_id" value="{{$board->category_id}}">
      <input type="submit" name="" value="送信する">
    </form>
    </div>
  </div>
@endsection
