<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Student/registerCourses.latte

class Template804cd2e9a3d1fa04a7c848be5949aebe extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('bbb6ddd966', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb56b12c9cd0_content')) { function _lb56b12c9cd0_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    
   
    <table class="tasks">


<tbody>
<?php $iterations = 0; foreach ($courses as $post) { ?>
	<tr>
		<td><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></td>
                <td><a  href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("UnregisterSubject!", array($post->id_course)), ENT_COMPAT) ?>
">UNREGISTER</a> </td>
		
	</tr>
<?php $iterations++; } ?>
</tbody>
</table>

    
  <fieldset>

<?php $_l->tmp = $_control->getComponent("registerCourseForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
	
</fieldset> 
   
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb3b468fd9b1_title')) { function _lb3b468fd9b1_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Registered courses</h1>
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