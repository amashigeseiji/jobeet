<?php use_stylesheet('jobs.css') ?>

<div id="jobs">
  <?php foreach ($categories as $category): ?>
    <div class="category_<?php echo Jobeet::slugfy($category->getName()) ?>">
      <div class="category">
        <div class="feed">
          <a href="">Feed</a>
        </div>
        <h1><?php echo $category ?></h1>
      </div>

      <table class="jobs">
        <?php foreach ($category->getActiveJobs() as $i => $job): ?>
          <tr class="<?php echo fmod($i, 2) ? 'even' : 'add' ?>">
            <td class="location">
              <?php echo $job->getLocation() ?>
            </td>
            <td class="position">
              <a href="<?php echo url_for('job_show_user', $job) ?>">
                <?php echo $job->getPosition() ?>
              </a>
            </td>
            <td class="company">
              <?php echo $job->getCompany() ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endforeach; ?>
  </div>
</div>
