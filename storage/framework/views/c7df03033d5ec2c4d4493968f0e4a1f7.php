<?php if (isset($component)) { $__componentOriginalff09156f73c896030ee75284e9b2c466 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff09156f73c896030ee75284e9b2c466 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<form method="POST" action="/quiz">
    <?php echo csrf_field(); ?>
    <div class="space-y-12 bg-gray-900 rounded-md p-2 text-lg ">
            <h2>
            write your chapter, question and correlated answer here.
        </h2>
        <div class="">

            <input class="block w-6/12 p-2.5 rounded-md text-black " placeholder="chapter">
        </div>

        <div class="">
            
            <input class="block w-6/12 p-2.5 rounded-md text-black " placeholder="question">
        </div>
        
        <div class="">

            <input class="block w-6/12 p-2.5 rounded-md text-black " placeholder="answer">
        </div>



        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/"><button type="button"
                    class="text-sm font-semibold leading-6 text-gray-900 text-white">Cancel</button></a>
            <a href="/"><button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </a>
        </div>
    </div>
    </div>
</form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $attributes = $__attributesOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__attributesOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $component = $__componentOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__componentOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\VG-projects\resources\views//quiz/create.blade.php ENDPATH**/ ?>