<div class="tab-pane fade show active" id="member" role="tabpanel" aria-labelledby="member-tab">
  <ul class="ks-cboxtags">
    @foreach ($memberInterests as $memberInterest)
      <li><input type="checkbox" name="member_interests[]" id="{{ 'member'.$memberInterest->id }}" value="{{ $memberInterest->id }}" {{ isset($personalDetails) ? (in_array($memberInterest->id, json_decode($personalDetails->member_interests != 'null' ? $personalDetails->member_interests : '[]')) ? 'checked' : '') : '' }} ><label for="{{ 'member'.$memberInterest->id }}">{{ $memberInterest->interests }}</label></li>
    @endforeach
  </ul>
</div>
<div class="tab-pane fade" id="spouse" role="tabpanel" aria-labelledby="spouse-tab">
  <ul class="ks-cboxtags">
    @foreach ($memberInterests as $memberInterest)
      <li><input type="checkbox" name="spouse_interests[]" id="{{ 'spouse'.$memberInterest->id }}" value="{{ $memberInterest->id }}" {{ isset($personalDetails) ? (in_array($memberInterest->id, json_decode($personalDetails->spouse_interests != 'null' ? $personalDetails->spouse_interests : '[]')) ? 'checked' : '') : '' }}  ><label for="{{ 'spouse'.$memberInterest->id }}">{{ $memberInterest->interests }}</label></li>
    @endforeach
</ul>
</div>
<div class="tab-pane fade" id="child" role="tabpanel" aria-labelledby="child-tab">
  <ul class="ks-cboxtags">
    @foreach ($memberInterests as $memberInterest)
      <li><input type="checkbox" name="child_interests[]" id="{{ 'child'.$memberInterest->id }}" value="{{ $memberInterest->id }}" {{ isset($personalDetails) ? (in_array($memberInterest->id, json_decode($personalDetails->child_interests != 'null' ? $personalDetails->child_interests : '[]')) ? 'checked' : '') : '' }}  ><label for="{{ 'child'.$memberInterest->id }}">{{ $memberInterest->interests }}</label></li>
    @endforeach
  </ul>
</div>
