<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\Insights;

use Piwik\Common;
use Piwik\View;

/**
 *
 */
class Controller extends \Piwik\Plugin\Controller
{

    public function getOverviewMoversAndShakers()
    {
        $idSite = Common::getRequestVar('idSite', null, 'int');
        $period = Common::getRequestVar('period', null, 'string');
        $date   = Common::getRequestVar('date', null, 'string');

        $view = new View('@Insights/index.twig');
        $this->setBasicVariablesView($view);

        $view->moversAndShakers = API::getInstance()->getOverallMoversAndShakers($idSite, $period, $date);
        $view->showNoDataMessage = false;
        $view->showInsightsControls = false;
        $view->properties = array(
            'show_increase' => true,
            'show_decrease' => true
        );

        return $view->render();
    }
}
