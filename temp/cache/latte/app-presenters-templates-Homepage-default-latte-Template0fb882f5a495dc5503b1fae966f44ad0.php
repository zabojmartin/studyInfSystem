<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Homepage/default.latte

class Template0fb882f5a495dc5503b1fae966f44ad0 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('cdb096f9ad', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb60c1a700b3_content')) { function _lb60c1a700b3_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    
    
      <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Teacher:default"), ENT_COMPAT) ?>
">teacher</a></p>  

    
  <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Person:addPerson"), ENT_COMPAT) ?>
">add person</a></p> 

     
   
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Department:default"), ENT_COMPAT) ?>
">Department</a></p> 
    
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Course:addCourse"), ENT_COMPAT) ?>
">add course</a></p>
    
       <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Student:"), ENT_COMPAT) ?>
">Student</a></p>
   
      
      
         
          
            
             
           
    
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb03191ac0d4_title')) { function _lb03191ac0d4_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Study Information System</h1>
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