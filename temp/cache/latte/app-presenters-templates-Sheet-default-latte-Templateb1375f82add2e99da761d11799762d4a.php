<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Sheet/default.latte

class Templateb1375f82add2e99da761d11799762d4a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9a2886c60f', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb0f51f0eae3_content')) { function _lb0f51f0eae3_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    
       <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sheet:createSheet"), ENT_COMPAT) ?>
">Create sheet</a></h2>

       <table >
<thead>
	<tr>
		
		<th>Sheet</th>
		<th>Date of creation</th>
                <th></th>
		
	</tr>
</thead>

<tbody>
<?php $iterations = 0; foreach ($sheets as $sheet) { ?>
	<tr>
		<td><?php echo Latte\Runtime\Filters::escapeHtml($sheet->id_sheet, ENT_NOQUOTES) ?></td>
                <td><?php echo Latte\Runtime\Filters::escapeHtml($sheet->dateOfCreation, ENT_NOQUOTES) ?></td>
               <td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sheet:editSheet", array($sheet->id_sheet)), ENT_COMPAT) ?>
">SHOW</a> </td>
		<td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sheet:generateSheet", array($sheet->id_sheet)), ENT_COMPAT) ?>
">EXPORT TO PDF</a> </td>
	</tr>
<?php $iterations++; } ?>
</tbody>
</table>
 
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb5435d7d49f_title')) { function _lb5435d7d49f_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>My sheets</h1>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php
}}