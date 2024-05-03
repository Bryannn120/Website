<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Events</h1>
        <?php if(Auth::user() && Auth::user()->role == 'admin'): ?>
            <a href="<?php echo e(route('events.create')); ?>" class="btn btn-primary">Create Event</a>
        <?php endif; ?>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start date</th>
                <th>Finish date</th>
                <th>Location</th>
                <th>Max tickets</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($event->event_name); ?></td>
                    <td><?php echo e($event->event_description); ?></td>
                    <td><?php echo e($event->date_start->format('Y-m-d')); ?></td>
                    <td><?php echo e($event->date_end->format('Y-m-d')); ?></td>
                    <td><?php echo e($event->location); ?></td>
                    <td><?php echo e($event->max_tickets); ?></td>
                    <td><?php echo e($event->price); ?></td>
                    <td>
                        <a href="<?php echo e(route('events.show', $event->event_id)); ?>" class="btn btn-primary">View Details</a>
                        <?php if(Auth::user() && Auth::user()->role == 'admin'): ?>
                            <a href="<?php echo e(route('events.edit', $event->event_id)); ?>" class="btn btn-primary">Edit</a>
                            <form action="<?php echo e(route('events.destroy', $event->event_id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Tugas\UTS\SeminarWebLaravel\resources\views/events/index.blade.php ENDPATH**/ ?>