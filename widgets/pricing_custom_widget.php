<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class Techscape_Pricing_One_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'techscape_pricing_one';
    }

    public function get_title()
    {
        return esc_html__('Ts Pricing One Custom', 'techscape-core');
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    public function get_categories()
    {
        return ['techscape_widgets'];
    }

    protected function register_controls()
    {

        //=====================Content=======================//

        //Heading
        $this->start_controls_section(
            'techscape_pricing_heading_section',
            [
                'label' => esc_html__('Heading', 'techscape-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'techscape_pricing_heading_title',
            [
                'label' => esc_html__('Heading Title', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Choose Your Plan', 'techscape-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'techscape_pricing_heading_desc',
            [
                'label' => esc_html__('Heading Description', 'techscape-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Services are professional offerings provided by businesses to meet specific needs or solve problems for their customers. Services can range from your budject.', 'techscape-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Content Section
        $this->start_controls_section(
            'techscape_pricing_month_content_tab_one_section',
            [
                'label' => esc_html__('Monthly Package', 'techscape-core'),
            ]
        );
        $this->add_control(
            'techscape_pricing_month_tab_title',
            [
                'label' => esc_html__('Tab Title', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Billed Monthly', 'techscape-core'),
                'label_block' => true,

            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'techscape_pricing_monthly_feature_switch',
            [
                'label' => esc_html__("Enable Feature", 'techscape-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'techscape-core'),
                'label_off' => esc_html__('No', 'techscape-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_package_title',
            [
                'label' => esc_html__('Package Title', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Basic Plan', 'techscape-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_currency_typ',
            [
                'label' => esc_html__('Currency Symbol', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('$', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_sale_price',
            [
                'label' => esc_html__('Sale Price', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('29', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_dis_price',
            [
                'label' => esc_html__('Original Price', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('39', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_type',
            [
                'label' => esc_html__('Package Type', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('/Monthly', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_icon_style_selection',
            [
                'label' => esc_html__('Select Icon/Offer Tag', 'techscape-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'icon' => esc_html__('Icon', 'techscape-core'),
                    'offer-tag' => esc_html__('Offer Tag', 'techscape-core'),
                ],
                'default' => 'icon',
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_icon_upload',
            [
                'label' => __('Icon', 'techscape-core'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'techscape_pricing_content_month_icon_style_selection' => 'icon',
                ],
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_offer_month_percentage',
            [
                'label' => esc_html__('Offer Percentage', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('30% <span>Off</span>', wp_kses_allowed_html('post')),
                'label_block' => true,
                'condition' => [
                    'techscape_pricing_content_month_icon_style_selection' => 'offer-tag',
                ],
            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_monthly_pack_desc',
            [
                'label' => esc_html__('Package Description', 'techscape-core'),
                'type' => Controls_Manager::WYSIWYG,
                'rows' => 10,
                'default' => wp_kses(' ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your description here', 'techscape-core'),

            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_button_txt',
            [
                'label' => esc_html__('Button Text', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Pay Now', 'techscape-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'techscape_pricing_content_month_button_link',
            [
                'label' => esc_html__('Link', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'techscape-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'techscape_price_package_monthly_list',
            [
                'label' => esc_html__('Monthly Package', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'techscape_pricing_content_month_package_title' => esc_html__('Basic Plan', 'techscape-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'techscape-core'),
                    ],
                    [
                        'techscape_pricing_content_month_package_title' => esc_html__('Professional Plan', 'techscape-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'techscape-core'),
                    ],
                    [
                        'techscape_pricing_content_month_package_title' => esc_html__('Enterprise Plan', 'techscape-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'techscape-core'),
                    ],
                ],
                'title_field' => '{{{ techscape_pricing_content_month_package_title }}}',
            ]
        );
        $this->end_controls_section();
        //Content Section
        $this->start_controls_section(
            'techscape_pricing_year_content_tab_two_section',
            [
                'label' => esc_html__('Yearly Package', 'techscape-core'),
            ]
        );

        $this->add_control(
            'techscape_pricing_year_tab_title',
            [
                'label' => esc_html__('Tab Title', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Billed Yearly', 'techscape-core'),
                'label_block' => true,

            ]
        );
        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'techscape_pricing_yearly_feature_switch',
            [
                'label' => esc_html__("Enable Feature", 'techscape-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'techscape-core'),
                'label_off' => esc_html__('No', 'techscape-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_package_title',
            [
                'label' => esc_html__('Package Title', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Basic Plan', 'techscape-core'),
                'label_block' => true,

            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_currency_typ',
            [
                'label' => esc_html__('Currency Symbol', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('$', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_sale_price',
            [
                'label' => esc_html__('Sale Price', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('290', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_dis_price',
            [
                'label' => esc_html__('Original Price', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('400', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_type',
            [
                'label' => esc_html__('Package Type', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('/Yearly', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_icon_style_selection',
            [
                'label' => esc_html__('Select Icon/Offer Tag', 'techscape-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'icon' => esc_html__('Icon', 'techscape-core'),
                    'offer-tag' => esc_html__('Offer Tag', 'techscape-core'),
                ],
                'default' => 'icon',
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_icon_upload',
            [
                'label' => __('Icon', 'techscape-core'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'techscape_pricing_content_year_icon_style_selection' => 'icon',
                ],
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_offer_year_percentage',
            [
                'label' => esc_html__('Offer Percentage', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('30% <span>Off</span>', wp_kses_allowed_html('post')),
                'label_block' => true,
                'condition' => [
                    'techscape_pricing_content_year_icon_style_selection' => 'offer-tag',
                ],
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_yearly_pack_desc',
            [
                'label' => esc_html__('Package Description', 'techscape-core'),
                'type' => Controls_Manager::WYSIWYG,
                'rows' => 10,
                'default' => wp_kses(' ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your description here', 'techscape-core'),

            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_button_txt',
            [
                'label' => esc_html__('Button Text', 'techscape-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Pay Now', 'techscape-core'),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'techscape_pricing_content_year_button_link',
            [
                'label' => esc_html__('Link', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'techscape-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'techscape_price_package_yearly_list',
            [
                'label' => esc_html__('Yearly Package', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'techscape_pricing_content_year_package_title' => esc_html__('Basic Plan', 'techscape-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'techscape-core'),
                    ],
                    [
                        'techscape_pricing_content_year_package_title' => esc_html__('Professional Plan', 'techscape-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'techscape-core'),
                    ],
                    [
                        'techscape_pricing_content_year_package_title' => esc_html__('Enterprise Plan', 'techscape-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'techscape-core'),
                    ],
                ],
                'title_field' => '{{{ techscape_pricing_content_year_package_title }}}',
            ]
        );
        $this->end_controls_section();

        //Style Start
        //Heading Title
        $this->start_controls_section(
            'techscape_pricing_heading_title_sec',
            [
                'label' => esc_html__('Heading Title', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-3 h2',
            ]
        );
        $this->add_control(
            'techscape_pricing_heading_title_color',
            [
                'label' => esc_html__('Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'techscape_pricing_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-3 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'techscape_pricing_heading_title_padding',
            [
                'label' => __('Padding', 'techscape-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-3 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Heading Description
        $this->start_controls_section(
            'techscape_pricing_heading_desc_sec',
            [
                'label' => esc_html__('Heading Description', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_heading_desc_typ',
                'selector' => '{{WRAPPER}} .section-title-3 p',
            ]
        );
        $this->add_control(
            'techscape_pricing_heading_desc_color',
            [
                'label' => esc_html__('Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-3 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'techscape_pricing_heading_desc_margin',
            [
                'label' => esc_html__('Margin', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-3 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'techscape_pricing_heading_desc_padding',
            [
                'label' => __('Padding', 'techscape-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Tab Title
        $this->start_controls_section(
            'techscape_pricing_tab_title_sec',
            [
                'label' => esc_html__('Tab Title', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_tab_title_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area nav .nav-tabs .nav-link',
            ]
        );
        $this->add_control(
            'techscape_pricing_tab_title_color',
            [
                'label' => esc_html__('Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area nav .nav-tabs .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_tab_title_bg_act_color',
            [
                'label' => esc_html__('Background Color (Active)', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area nav .nav-tabs .nav-link.active' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_tab_title_bg_color',
            [
                'label' => esc_html__('Background Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-tabs .nav-link' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'techscape_pricing_tab_title_margin',
            [
                'label' => esc_html__('Margin', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area nav .nav-tabs' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Package Title
        $this->start_controls_section(
            'techscape_pricing_pack_title_sec',
            [
                'label' => esc_html__('Package Title', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_pack_title_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top span',
            ]
        );
        $this->add_control(
            'techscape_pricing_pack_title_nor_color',
            [
                'label' => esc_html__('Normal Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_pack_title_featured_color',
            [
                'label' => esc_html__('Featured Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Sale Price
        $this->start_controls_section(
            'techscape_pricing_sale_price_sec',
            [
                'label' => esc_html__('Sale Price', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_sale_price_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top h2',
            ]
        );
        $this->add_control(
            'techscape_pricing_sale_price_nor_color',
            [
                'label' => esc_html__('Normal Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top h2 sup' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_sale_price_featured_color',
            [
                'label' => esc_html__('Featured Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top h2 sup' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Original Price
        $this->start_controls_section(
            'techscape_pricing_dis_price_sec',
            [
                'label' => esc_html__('Original Price', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_dis_price_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top h2 sub del',
            ]
        );
        $this->add_control(
            'techscape_pricing_dis_price_nor_color',
            [
                'label' => esc_html__('Normal Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top h2 sub del' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_dis_price_featured_color',
            [
                'label' => esc_html__('Featured Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top h2 sub del' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Package Type
        $this->start_controls_section(
            'techscape_pricing_pac_type_price_sec',
            [
                'label' => esc_html__('Package Type', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_pac_type_price_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top h2 sub',
            ]
        );
        $this->add_control(
            'techscape_pricing_pac_type_price_nor_color',
            [
                'label' => esc_html__('Normal Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top h2 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_pac_type_price_featured_color',
            [
                'label' => esc_html__('Featured Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top h2 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Icon & SVG
        $this->start_controls_section(
            'techscape_pricing_icon_price_sec',
            [
                'label' => esc_html__('Icon & SVG', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'techscape_pricing_icon_price_color',
            [
                'label' => esc_html__('Icon Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-top svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Offer Tag
        $this->start_controls_section(
            'techscape_pricing_offer_tag_type_price_sec',
            [
                'label' => esc_html__('Offer Tag', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_offer_tag_type_price_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top .offer-tag h5',
            ]
        );
        $this->add_control(
            'techscape_pricing_offer_tag_type_price_txt_color',
            [
                'label' => esc_html__('Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top .offer-tag h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top .offer-tag h5>span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_offer_tag_type_price_bg_color',
            [
                'label' => esc_html__('Background Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-top .offer-tag svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Package Description
        $this->start_controls_section(
            'techscape_pricing_pack_desc_sec',
            [
                'label' => esc_html__('Package Description', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_pack_desc_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-content ul li',
            ]
        );
        $this->add_control(
            'techscape_pricing_pack_desc_nor_icon_color',
            [
                'label' => esc_html__('Normal Icon Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-content ul li::before' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_pack_desc_nor_color',
            [
                'label' => esc_html__('Normal Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_pack_desc_feature_icon_color',
            [
                'label' => esc_html__('Featured Icon Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-content ul li::before' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_pack_desc_featured_color',
            [
                'label' => esc_html__('Featured Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Normal Button
        $this->start_controls_section(
            'techscape_pricing_nor_btn_style',
            [
                'label' => esc_html__('Normal Button', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'techscape_pricing_nor_btn_margin',
            [
                'label' => esc_html__('Margin', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-content .pay-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Tabs
        $this->start_controls_tabs(
            'techscape_pricing_nor_tabs'
        );

        $this->start_controls_tab(
            'techscape_pricing_nor_normal_tab',
            [
                'label' => esc_html__('Normal', 'techscape-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_nor_btn_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-content .pay-btn a',

            ]
        );
        $this->add_control(
            'techscape_pricing_nor_btn_txt_color',
            [
                'label' => esc_html__('Text Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_nor_btn_background',
            [
                'label' => esc_html__('Background', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        // Hover start
        $this->start_controls_tab(
            'techscape_pricing_nor_hover_tab',
            [
                'label' => esc_html__('Hover', 'techscape-core'),
            ]
        );
        $this->add_control(
            'techscape_pricing_nor_btn_txt_hvr_color',
            [
                'label' => esc_html__('Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_nor_btn_bg_hover',
            [
                'label' => esc_html__('Background', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //Featured Button
        $this->start_controls_section(
            'techscape_pricing_feature_btn_style',
            [
                'label' => esc_html__('Featured Button', 'techscape-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'techscape_pricing_feature_btn_margin',
            [
                'label' => esc_html__('Margin', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-content .pay-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Tabs
        $this->start_controls_tabs(
            'techscape_pricing_feature_tabs'
        );

        $this->start_controls_tab(
            'techscape_pricing_feature_normal_tab',
            [
                'label' => esc_html__('Normal', 'techscape-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'techscape-core'),
                'name' => 'techscape_pricing_feature_btn_typ',
                'selector' => '{{WRAPPER}} .home3-pricing-plan-area .pricing-card .pricing-content .pay-btn a',

            ]
        );
        $this->add_control(
            'techscape_pricing_feature_btn_txt_color',
            [
                'label' => esc_html__('Text Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-content .pay-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_feature_btn_background',
            [
                'label' => esc_html__('Background', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-content .pay-btn a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        // Hover start
        $this->start_controls_tab(
            'techscape_pricing_feature_hover_tab',
            [
                'label' => esc_html__('Hover', 'techscape-core'),
            ]
        );
        $this->add_control(
            'techscape_pricing_feature_btn_txt_hvr_color',
            [
                'label' => esc_html__('Color', 'techscape-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-content .pay-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'techscape_pricing_feature_btn_bg_hover',
            [
                'label' => esc_html__('Background', 'techscape-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-pricing-plan-area .pricing-card.two .pricing-content .pay-btn a::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['techscape_price_package_monthly_list'];
        $data2 = $settings['techscape_price_package_yearly_list'];
        $widget_id = $this->get_id();
        ?>

        <div class="home3-pricing-plan-area">
            <div class="row mb-55">
                <div class="col-lg-12 d-flex align-items-center justify-content-between gap-4 flex-wrap">
                    <div class="section-title-3">
                        <h2><?php echo esc_html($settings['techscape_pricing_heading_title']) ?></h2>
                        <p><?php echo wp_kses($settings['techscape_pricing_heading_desc'], wp_kses_allowed_html('post')) ?></p>
                    </div>
                    <nav>
                        <?php $new_str = str_replace(' ', "-$widget_id-", $settings['techscape_pricing_month_tab_title']);?>
                        <?php $new_str2 = str_replace(' ', "-$widget_id-", $settings['techscape_pricing_year_tab_title']);?>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <?php if (!empty($settings['techscape_pricing_month_tab_title'])): ?>
                                <button class="nav-link active" id="nav-<?php echo $new_str ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $new_str ?>" type="button" role="tab" aria-controls="nav-<?php echo $new_str ?>" aria-selected="true"><?php echo esc_html($settings['techscape_pricing_month_tab_title']) ?></button>
                            <?php endif?>
                            <?php if (!empty($settings['techscape_pricing_year_tab_title'])): ?>
                                <button class="nav-link" id="nav-<?php echo $new_str2 ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $new_str2 ?>" type="button" role="tab" aria-controls="nav-<?php echo $new_str2 ?>" aria-selected="false"><?php echo esc_html($settings['techscape_pricing_year_tab_title']) ?></button>
                            <?php endif?>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-<?php echo $new_str ?>" role="tabpanel" aria-labelledby="nav-<?php echo $new_str ?>-tab" tabindex="0">
                            <div class="row g-lg-0 g-4 align-items-center justify-content-center">
                                <?php foreach ($data as $item): ?>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-card <?php echo $item['techscape_pricing_monthly_feature_switch'] == "yes" ? "two" : ""; ?>">
                                            <div class="pricing-top">
                                                <div class="left">
                                                    <?php if (!empty($item['techscape_pricing_content_month_package_title'])): ?>
                                                        <span><?php echo wp_kses($item['techscape_pricing_content_month_package_title'], wp_kses_allowed_html('post')) ?></span>
                                                    <?php endif?>
                                                    <?php if (!empty($item['techscape_pricing_content_month_sale_price'])): ?>
                                                        <h2>
                                                            <?php if (!empty($item['techscape_pricing_content_month_currency_typ'])): ?>
                                                                <sup><?php echo wp_kses($item['techscape_pricing_content_month_currency_typ'], wp_kses_allowed_html('post')) ?></sup>
                                                            <?php endif?>
                                                            <?php echo wp_kses($item['techscape_pricing_content_month_sale_price'], wp_kses_allowed_html('post')) ?>
                                                            <?php if (!empty($item['techscape_pricing_content_month_dis_price'])): ?>
                                                                <sub>
                                                                    <?php if (!empty($item['techscape_pricing_content_month_currency_typ'])): ?>
                                                                        <span><?php echo wp_kses($item['techscape_pricing_content_month_currency_typ'], wp_kses_allowed_html('post')) ?></span>
                                                                    <?php endif?>
                                                                    <del><?php echo wp_kses($item['techscape_pricing_content_month_dis_price'], wp_kses_allowed_html('post')) ?></del>
                                                                </sub>
                                                            <?php endif?>
                                                            <?php if (!empty($item['techscape_pricing_content_month_type'])): ?>
                                                                <sub class="my"><?php echo wp_kses($item['techscape_pricing_content_month_type'], wp_kses_allowed_html('post')) ?></sub>
                                                            <?php endif?>
                                                        </h2>
                                                    <?php endif?>
                                                </div>
                                                <div class="right">

                                                    <?php if ($item['techscape_pricing_content_month_icon_style_selection'] == 'icon'): ?>
                                                        <?php if (!empty($item['techscape_pricing_content_month_icon_upload'])): ?>
                                                            <?php \Elementor\Icons_Manager::render_icon($item['techscape_pricing_content_month_icon_upload'], ['aria-hidden' => 'true']);?>
                                                        <?php endif?>
                                                    <?php endif?>

                                                    <?php if ($item['techscape_pricing_content_month_icon_style_selection'] == 'offer-tag'): ?>

                                                        <?php if (!empty($item['techscape_pricing_content_offer_month_percentage'])): ?>
                                                            <div class="offer-tag">
                                                                <svg width="89" height="90" viewBox="0 0 89 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M39.4006 2.86424C42.255 0.141447 46.745 0.141447 49.5994 2.86424C51.6196 4.79129 54.5536 5.41492 57.183 4.47617C60.8981 3.14978 64.9999 4.97602 66.5001 8.62441C67.5618 11.2066 69.9885 12.9696 72.7724 13.1815C76.7058 13.4809 79.7102 16.8176 79.5967 20.7607C79.5164 23.5515 81.0162 26.1491 83.4732 27.475C86.9448 29.3483 88.3323 33.6185 86.6248 37.1747C85.4164 39.6915 85.7299 42.6746 87.4352 44.8852C89.8447 48.0086 89.3754 52.4739 86.3692 55.0281C84.2415 56.8359 83.3146 59.6886 83.9734 62.4017C84.9042 66.2351 82.6592 70.1235 78.8739 71.2341C76.195 72.0201 74.1879 74.2492 73.6862 76.9957C72.9773 80.8763 69.3449 83.5154 65.4352 82.9904C62.6681 82.6189 59.9279 83.8389 58.3525 86.1438C56.1265 89.4006 51.7346 90.3341 48.3765 88.2643C45.9998 86.7994 43.0002 86.7994 40.6235 88.2643C37.2654 90.3341 32.8735 89.4006 30.6475 86.1438C29.0721 83.8389 26.3319 82.6189 23.5648 82.9904C19.6551 83.5154 16.0227 80.8763 15.3138 76.9957C14.8121 74.2492 12.805 72.0201 10.1261 71.2341C6.34083 70.1235 4.09585 66.2351 5.02664 62.4017C5.6854 59.6886 4.7585 56.8359 2.63083 55.0281C-0.375411 52.4739 -0.844741 48.0086 1.56476 44.8852C3.27009 42.6746 3.58362 39.6915 2.37517 37.1747C0.667712 33.6185 2.05519 29.3483 5.52678 27.475C7.9838 26.1491 9.48356 23.5515 9.40328 20.7607C9.28984 16.8176 12.2942 13.4809 16.2276 13.1815C19.0115 12.9696 21.4382 11.2066 22.4999 8.62441C24.0001 4.97602 28.1019 3.14978 31.817 4.47617C34.4464 5.41492 37.3804 4.79129 39.4006 2.86424Z" fill="#0F0F0F" />
                                                                </svg>
                                                                <h5>
                                                                    <?php echo wp_kses($item['techscape_pricing_content_offer_month_percentage'], wp_kses_allowed_html('post')) ?>
                                                                </h5>
                                                            </div>
                                                        <?php endif?>

                                                    <?php endif?>
                                                </div>
                                            </div>
                                            <div class="pricing-content">
                                                <?php if (!empty($item['techscape_pricing_content_monthly_pack_desc'])): ?>
                                                    <?php echo wp_kses($item['techscape_pricing_content_monthly_pack_desc'], wp_kses_allowed_html('post')) ?>
                                                <?php endif?>
                                                <?php if (!empty($item['techscape_pricing_content_month_button_txt'])): ?>
                                                    <div class="pay-btn">
                                                        <a class="primary-btn3" href="<?php echo esc_url($item['techscape_pricing_content_month_button_link']['url']) ?>">
                                                            <?php echo esc_html($item['techscape_pricing_content_month_button_txt']) ?>
                                                        </a>
                                                    </div>
                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-<?php echo $new_str2 ?>" role="tabpanel" aria-labelledby="nav-<?php echo $new_str2 ?>-tab" tabindex="0">
                            <div class="row g-lg-0 g-4 align-items-center justify-content-center">
                                <?php foreach ($data2 as $item2): ?>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-card <?php echo $item2['techscape_pricing_yearly_feature_switch'] == "yes" ? "two" : ""; ?>">
                                            <div class="pricing-top">
                                                <div class="left">
                                                    <?php if (!empty($item2['techscape_pricing_content_year_package_title'])): ?>
                                                        <span><?php echo wp_kses($item2['techscape_pricing_content_year_package_title'], wp_kses_allowed_html('post')) ?></span>
                                                    <?php endif?>
                                                    <?php if (!empty($item2['techscape_pricing_content_year_sale_price'])): ?>
                                                        <h2>
                                                            <?php if (!empty($item2['techscape_pricing_content_year_currency_typ'])): ?>
                                                                <sup><?php echo wp_kses($item2['techscape_pricing_content_year_currency_typ'], wp_kses_allowed_html('post')) ?></sup>
                                                            <?php endif?>
                                                            <?php echo wp_kses($item2['techscape_pricing_content_year_sale_price'], wp_kses_allowed_html('post')) ?>

                                                            <?php if (!empty($item2['techscape_pricing_content_year_dis_price'])): ?>
                                                                <sub>
                                                                    <?php if (!empty($item2['techscape_pricing_content_year_currency_typ'])): ?>
                                                                        <span><?php echo wp_kses($item2['techscape_pricing_content_year_currency_typ'], wp_kses_allowed_html('post')) ?></span>
                                                                    <?php endif?>
                                                                    <del><?php echo wp_kses($item2['techscape_pricing_content_year_dis_price'], wp_kses_allowed_html('post')) ?></del>
                                                                </sub>
                                                            <?php endif?>
                                                            <?php if (!empty($item2['techscape_pricing_content_year_type'])): ?>
                                                                <sub class="my"><?php echo wp_kses($item2['techscape_pricing_content_year_type'], wp_kses_allowed_html('post')) ?></sub>
                                                            <?php endif?>
                                                        </h2>

                                                    <?php endif?>
                                                </div>
                                                <div class="right">
                                                    <?php if ($item2['techscape_pricing_content_year_icon_style_selection'] == 'icon'): ?>
                                                        <?php if (!empty($item2['techscape_pricing_content_year_icon_upload'])): ?>
                                                            <?php \Elementor\Icons_Manager::render_icon($item2['techscape_pricing_content_year_icon_upload'], ['aria-hidden' => 'true']);?>
                                                        <?php endif?>
                                                    <?php endif?>

                                                    <?php if ($item2['techscape_pricing_content_year_icon_style_selection'] == 'offer-tag'): ?>
                                                        <?php if (!empty($item2['techscape_pricing_content_offer_year_percentage'])): ?>
                                                            <div class="offer-tag">
                                                                <svg width="89" height="90" viewBox="0 0 89 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M39.4006 2.86424C42.255 0.141447 46.745 0.141447 49.5994 2.86424C51.6196 4.79129 54.5536 5.41492 57.183 4.47617C60.8981 3.14978 64.9999 4.97602 66.5001 8.62441C67.5618 11.2066 69.9885 12.9696 72.7724 13.1815C76.7058 13.4809 79.7102 16.8176 79.5967 20.7607C79.5164 23.5515 81.0162 26.1491 83.4732 27.475C86.9448 29.3483 88.3323 33.6185 86.6248 37.1747C85.4164 39.6915 85.7299 42.6746 87.4352 44.8852C89.8447 48.0086 89.3754 52.4739 86.3692 55.0281C84.2415 56.8359 83.3146 59.6886 83.9734 62.4017C84.9042 66.2351 82.6592 70.1235 78.8739 71.2341C76.195 72.0201 74.1879 74.2492 73.6862 76.9957C72.9773 80.8763 69.3449 83.5154 65.4352 82.9904C62.6681 82.6189 59.9279 83.8389 58.3525 86.1438C56.1265 89.4006 51.7346 90.3341 48.3765 88.2643C45.9998 86.7994 43.0002 86.7994 40.6235 88.2643C37.2654 90.3341 32.8735 89.4006 30.6475 86.1438C29.0721 83.8389 26.3319 82.6189 23.5648 82.9904C19.6551 83.5154 16.0227 80.8763 15.3138 76.9957C14.8121 74.2492 12.805 72.0201 10.1261 71.2341C6.34083 70.1235 4.09585 66.2351 5.02664 62.4017C5.6854 59.6886 4.7585 56.8359 2.63083 55.0281C-0.375411 52.4739 -0.844741 48.0086 1.56476 44.8852C3.27009 42.6746 3.58362 39.6915 2.37517 37.1747C0.667712 33.6185 2.05519 29.3483 5.52678 27.475C7.9838 26.1491 9.48356 23.5515 9.40328 20.7607C9.28984 16.8176 12.2942 13.4809 16.2276 13.1815C19.0115 12.9696 21.4382 11.2066 22.4999 8.62441C24.0001 4.97602 28.1019 3.14978 31.817 4.47617C34.4464 5.41492 37.3804 4.79129 39.4006 2.86424Z" fill="#0F0F0F" />
                                                                </svg>
                                                                <h5>
                                                                    <?php echo wp_kses($item2['techscape_pricing_content_offer_year_percentage'], wp_kses_allowed_html('post')) ?>
                                                                </h5>
                                                            </div>
                                                        <?php endif?>
                                                    <?php endif?>
                                                </div>
                                            </div>
                                            <div class="pricing-content">
                                                <?php if (!empty($item2['techscape_pricing_content_yearly_pack_desc'])): ?>
                                                    <?php echo wp_kses($item2['techscape_pricing_content_yearly_pack_desc'], wp_kses_allowed_html('post')) ?>
                                                <?php endif?>
                                                <?php if (!empty($item2['techscape_pricing_content_year_button_txt'])): ?>
                                                    <div class="pay-btn">
                                                        <a class="primary-btn3" href="<?php echo esc_url($item2['techscape_pricing_content_year_button_link']['url']) ?>">
                                                            <?php echo esc_html($item2['techscape_pricing_content_year_button_txt']) ?>
                                                        </a>
                                                    </div>
                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
