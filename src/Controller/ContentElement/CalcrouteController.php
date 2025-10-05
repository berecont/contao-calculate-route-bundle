<?php

declare(strict_types=1);

namespace Berecont\ContaoCalcrouteBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ContentUrlGenerator;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Contao\StringUtil;

#[AsContentElement(
    type: 'route_element',
    category: 'miscellaneous',
    template: 'content_element/calc_route'
)]
class CalcrouteController extends AbstractContentElementController
{
    public function __construct(private readonly ScopeMatcher $scopeMatcher) {}
    
    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {

        $template->setData($model->row());

        $attributesData = StringUtil::deserialize($model->cssID ?? [] ?: '', true);
        $headlineData = StringUtil::deserialize($model->headline ?? [] ?: '', true);

        $template->headline = [
            'text' => $headlineData['value'] ?? '',
            'tag_name' => $headlineData['unit'] ?? 'h2',
        ];

        $template->element_html_id = $attributesData[0] ?? null;
        $template->element_css_classes = trim($attributesData[1] ?? '');

        $template->as_editor_view = $this->scopeMatcher->isBackendRequest($request);

        return $template->getResponse();
        
    }
}