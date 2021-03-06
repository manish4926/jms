@extends('partials.sidebar')

@section('basecontent')

{!! Form::open(['route' => 'addScholarshipSubmit', 'id' => 'frmpost', 'files'=> true, 'form-horizontal', 'class' => '', 'enctype'=>'multipart/form-data']) !!}
<input name="post_status" id="post_status" type="hidden" value="1">
<input name="post_id" id="post_id" type="hidden" value="{{ $scholarship->id }}">
<div style=" width: 100%; min-height:200px; margin-top: 20px;">
	@if(empty($scholarship->link))
	<h4 class="sectionhead">SUBMIT A NEW SCHOLARSHIP</h4>
	@elseif(!empty($scholarship->link))
	<h4 class="sectionhead">SUBMIT A LINKED SCHOLARSHIP</h4>
	@endif
	<h4 class="sectionhead"><i class="glyphicon glyphicon-file"></i>Scholarship Summary</h4>
<div>

<div class="form-group">
	<input type="text" name="title" placeholder="*Scholarship Title" value="{{ $scholarship->title }}" class="form-control input-sm">
</div>
@if(empty($scholarship->link))
<input type="hidden" name="link">
@elseif(!empty($scholarship->link))
<div class="form-group">
	<input type="text" name="link" placeholder="Scholarship Link" value="{{ $scholarship->link }}" class="form-control input-sm">
</div>
@endif

<div class="form-group">
    <input name="location" id="city" type="text" value="{{ $scholarship->location }}" placeholder="*City" class="form-control input-sm">
</div>

<div class="form-group">
	<select class="form-control gray" name="state" id="state" >
		@foreach(state() as $key =>$states) 

            <option value="{{ $key }}" {{ $scholarship->state == $key ? "selected" : ""  }}>{{ $key }}</option>
        @endforeach
	</select>
</div>

<div class="form-group">
    <input name="amount" id="amount" type="text" value="{{ $scholarship->scholarship_amount }}" placeholder="*Scholarship Amount (INR)" class="form-control input-sm">
</div>

<div class="form-group">
    <input name="openings_count" id="openings_count" type="text" value="{{ $scholarship->openings_count }}" placeholder="*Number of Open Scholarships " class="form-control input-sm">
</div>


					
<!--Start-Application Submission Dead Line Date-->
<div style="display: inline-block; margin-right: 50px;"><h4 class="sectionhead">Application Submission Dead Line Date</h4></div><br/>
	<div class="form-group">
    	<input name="last_date" id="last_date" type="text" value="{{ $scholarship->last_date }}" placeholder="End Date " class="form-control input-sm">
	</div>
<!--End-Application Submission Dead Line Date-->

<div style="display: inline-block; margin-right: 50px;"><h4 class="sectionhead">Scholarship Duration</h4></div><br/>
<div class="form-group">
	<input name="coursestartdate" id="coursestartdate" type="text" value="{{ $scholarship->scholar_start_date }}" placeholder="Scholarship Start Date " class="form-control input-sm"><br>
	<input name="courseenddate" id="courseenddate" type="text" value="{{ $scholarship->scholar_end_date }}" placeholder="Scholarship End Date " class="form-control input-sm">
</div>


<div class="form-group" >
	<textarea name="description" id="description" class="form-control input-sm" placeholder="*Brief Summary" style="height:190px;">{{ $scholarship->brief_summary }}</textarea>
</div>

<div style="margin-bottom: 55px; width: 100%;">
	
	<h4 class="sectionhead">Scholarship Details</h4>

	<div class="form-group">
		<textarea name="requirements" id="requirements" class="form-control input-sm" placeholder="Requirements to Apply" style="height:190px;">{{ $scholarship->requirements }}</textarea>
	</div>

	<div class="form-group">
		<textarea name="prerequisits" id="pre" class="form-control input-sm" placeholder="Scholarship Prerequisits" style="height:190px;">{{ $scholarship->prerequisits }}</textarea>
	</div>

	<div class="form-group">
		<textarea name="details" id="details" class="form-control input-sm" placeholder="Scholarship Details" style="height:190px;">{{ $scholarship->details }}</textarea>
	</div>

	<div class="form-group">
		<textarea name="about_corp" id="about" class="form-control input-sm" placeholder="About Company/School" style="height:190px;">{{ $scholarship->about_company }}</textarea>
	</div>
	
	<div class="form-group">
		<textarea name="application_info" id="app_info" class="form-control input-sm" placeholder="Application info" style="height:190px;">{{ $scholarship->application_info }}</textarea>
	</div>

	<div class="form-group"> <h4 class="sectionhead">Attachment Files </h4>

	File Upload Form 
	
<!-- File Upload Start -->
	<table><tr> <td style="vertical-align: top;">
	        
			<input type="hidden" name="files_uploaded" id="__files_uploaded" value="">

			<input type="file" name="file" class="upload-file-input" id="__files" onchange="filesChanged()" style="float: left; visibility: hidden; max-width: 0;" multiple>

			<a href="" class="btn btn-default upload-icon-a" onclick="uploadButtonPressed(); return false;"  style="float: left; margin-right: 15px;"><i style="font-size: 18px;" class="glyphicon glyphicon-upload"></i></a>

	        </td> <td><div id="__filescontentold" style="max-width: 700px; float: left;">
		   
		</div><br/>

		<div id="__filescontent" style="max-width: 700px; float: left;"></div>

		</td></tr></table>

	</div>
<!-- End File Upload-->
	</div>

	<div class="form-group">
		<textarea name="criteria" id="criteria" class="form-control input-sm" placeholder="Selection Criteria" style="height:190px;">{{ $scholarship->selection_criteria }}</textarea>
	</div>

	<div class="form-group">
		<textarea name="other" id="other" class="form-control input-sm" placeholder="Other" style="height:190px;">{{ $scholarship->others }}</textarea>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingTwo">
		<h4 class="panel-title">
			<a role="button" data-toggle="collapse" class="sectionhead2" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				CONTACT PERSON INFO
			</a>
		</h4>
	</div>
	<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
		<div class="panel-body" style="">
			<div>
				<div>
					<input class="btn rightNavActive"  type="button" value="Import Contact Details from my Profile" onclick="importDetails(); return false;" style="margin-bottom: 20px; float: right;" />
				</div>

				<div class="form-group">
				    <input name="contact_name" id="contact_name" type="text" value="{{ $scholarship->name }}" placeholder="*Name" class="form-control input-sm">
				</div>
				<div class="form-group"> 
				    <input name="contact_phone" id="contact_phone" type="text" value="{{ $scholarship->phone }}" placeholder="*Phone" class="form-control input-sm">
				</div>
				<div class="form-group">
					<input name="contact_email" id="contact_email" type="text" value="{{ $scholarship->email }}" placeholder="*Email" class="form-control input-sm">
				</div>
			</div>

		</div>

	</div>

</div>
	<input type="hidden" name="posted_by" value="{{$user->id}}"/>


<div style="margin-top: 15px; align:center">
	<input id="submit" class="btn rightNavActive" type="submit" value="Submit Scholarship" onclick="submit(id);"/>
		<input id="submit" class="btn rightNavActive" type="submit" value="Save as Draft" onclick="submit(id);" style=" margin-left: 20px;"/>
</div>
{!!Form::close()!!}

@push('bottomscripts')
<script>
$(function() {
    $('#last_date').datepicker({
    	changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: '2017:2019',
        dateFormat: 'yy-mm-dd'
    });

    $('#coursestartdate').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: '2017:2019',
        dateFormat: 'yy-mm-dd'
    });

    $('#courseenddate').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: '2017:2019',
        dateFormat: 'yy-mm-dd'
    });
});

function submit(id){
	$("#post_status").val(id);
    $("#frmpost").submit();
}
</script>
@endpush
@endsection