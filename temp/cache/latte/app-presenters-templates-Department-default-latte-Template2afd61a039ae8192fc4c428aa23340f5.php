<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Department/default.latte

class Template2afd61a039ae8192fc4c428aa23340f5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('bdbf2fb274', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb2694403fd5_content')) { function _lb2694403fd5_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    
    <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Department:addDepartment"), ENT_COMPAT) ?>
">add department</a></h2>
    

<?php $iterations = 0; foreach ($departments as $key => $post) { ?>
    <div class="post">
     
     
        <p><?php echo Latte\Runtime\Filters::escapeHtml($post->name, ENT_NOQUOTES) ?></p>

    </div>
<?php $iterations++; } ?>
    
 
   
   
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb0ddbb12a9b_title')) { function _lb0ddbb12a9b_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Departments</h1>
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