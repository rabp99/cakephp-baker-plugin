<?php
declare(strict_types=1);

use Cake\Event\EventInterface;
use Cake\Event\EventManager;

EventManager::instance()->on('Bake.initialize', function (EventInterface $event) {
    $view = $event->getSubject();

    // In my bake templates, allow the use of the MySpecial helper
    $view->loadHelper('Rabp99/Bake.ApiRest');
});

EventManager::instance()->on(
    'Bake.beforeRender.Controller.controller',
    function (EventInterface $event) {
        $view = $event->getSubject();
        $actions = ['index', 'view', 'add', 'edit'];
        
        $fields = $view->get('modelObj')->getSchema()->columns();
        if (array_search("state", $fields)) {
            $actions = array_merge($actions, ['enable', 'disable']);
        } else {
            $actions = array_merge($actions, ['delete']);
        }
        $view->set('actions', $actions);
        if ($view->get('name') === 'Users') {
            // add the login and changePassword actions to the Users controller
            $view->set('actions', array_merge($actions, [
                'login',
                'changePassword',
                'resetPassword'
            ]));
        }
    }
);