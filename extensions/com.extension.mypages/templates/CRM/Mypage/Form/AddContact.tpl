
<div>First Name : {$form.first_name.html}</div>
<div> Last Name:{$form.last_name.html}</div>
<div> Email:{$form.email.html}</div>
<div>Phone :{$form.phone.html}</div>
<div>Issues:{$form.field1_10.html}</div>
<div>Have you Previously Contributed/Donated:{$form.field_2_11.html}</div>
<div class="crm-submit-buttons">
    {include file="CRM/common/formButtons.tpl" location="top"}
</div>

<div id="customData" class="crm-contribution-form-block-customData"></div>
 {include file="CRM/common/customData.tpl"}

 
 {literal}
 <script type="text/javascript">

 cj( document ).ready(function() {
  var issues = '{/literal}{$field1_10}{literal}';
  var prev_contri = '{/literal}{$field_2_11}{literal}';
  alert(prev_contri);
  cj("input[name='field1_10']").each(function (){
		
		if(cj(this).val() == issues){
			cj(this).attr('checked', true);
		}
		
	});
	
	cj('[name="field_2_11"]').val(prev_contri);
 });
 	
 </script>
{/literal}

