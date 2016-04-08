<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Teacher/registerTeacher.latte

class Template88afeedf0f168819158a21946732b494 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('97a470db10', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbaea6ec2e6e_content')) { function _lbaea6ec2e6e_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>   
    
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
  <fieldset>
	
        

    
    <p>Zaregistrovat předměty</p>
<?php $_l->tmp = $_control->getComponent("registerTeacherForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
	
</fieldset> 
   
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb0729e7a711_title')) { function _lb0729e7a711_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>   <h1>Registered teacher to course</h1>        
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