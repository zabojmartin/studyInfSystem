<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Sheet/editSheet.latte

class Templateb45cb6ede8da24fbb7d22d1a6b8b5fc7 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('be2ddc0a97', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb6f4844035e_content')) { function _lb6f4844035e_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    
    <h2>Sheet <?php echo Latte\Runtime\Filters::escapeHtml($idSheet, ENT_NOQUOTES) ?> </h2>
     <td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Record:addRecord", array($idSheet)), ENT_COMPAT) ?>
">Add new record</a> </td>

       <table >
<thead>
	<tr>
		
		<th>Subject</th>
		
                <th>Hours</th>
                 <th>Note</th>
                <th></th>
		
	</tr>
</thead>

<tbody>
<?php $iterations = 0; foreach ($records as $record) { ?>
	<tr>
		<td><?php echo Latte\Runtime\Filters::escapeHtml($record->id_subject, ENT_NOQUOTES) ?></td>
               
                <td><?php echo Latte\Runtime\Filters::escapeHtml($record->numberOfHours, ENT_NOQUOTES) ?></td>
                 <td><?php echo Latte\Runtime\Filters::escapeHtml($record->note, ENT_NOQUOTES) ?></td>
               <td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Record:editRecord", array($idSheet, 'idRecord' => $record->id_record)), ENT_COMPAT) ?>
">EDIT</a> </td>
              
		
	</tr>
<?php $iterations++; } ?>
</tbody>
</table>
 
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb50a0251403_title')) { function _lb50a0251403_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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