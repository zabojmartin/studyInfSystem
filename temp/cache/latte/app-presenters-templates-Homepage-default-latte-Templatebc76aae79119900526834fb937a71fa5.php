<?php
// source: C:\xampp\htdocs\study\sandbox\app\presenters/templates/Homepage/default.latte

class Templatebc76aae79119900526834fb937a71fa5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c29204df2c', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb5e29b08b9f_content')) { function _lb5e29b08b9f_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

<?php $iterations = 0; foreach ($persons as $post) { ?>
    <div class="post">
     

        <h2><?php echo Latte\Runtime\Filters::escapeHtml($post->name, ENT_NOQUOTES) ?></h2>

    </div>
<?php $iterations++; } ?>
    
  <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Person:addPerson"), ENT_COMPAT) ?>
">add person</a></p> 
   <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Teacher:default"), ENT_COMPAT) ?>
">teacher</a></p>  
     <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Teacher:addTeacher"), ENT_COMPAT) ?>
">add teacher</a></p>  
   
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Department:default"), ENT_COMPAT) ?>
">Department</a></p> 
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Department:addDepartment"), ENT_COMPAT) ?>
">add department</a></p>
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Course:addCourse"), ENT_COMPAT) ?>
">add course</a></p>
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Student:addStudent"), ENT_COMPAT) ?>
">add student</a></p>
       <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Student:registerCourses"), ENT_COMPAT) ?>
">register courses</a></p>
        <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Teacher:registerTeacher"), ENT_COMPAT) ?>
">register teacher to course</a></p>
    
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb371d326d58_title')) { function _lb371d326d58_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Můj blog</h1>
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