<?php

declare(strict_types=1);

namespace Sbarbat\SyliusSagepayPlugin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

final class SagepayFormGatewayConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sandbox', ChoiceType::class, [
                'choices' => [
                    'sbarbat_sylius_sagepay_plugin.ui.test' => true,
                    'sbarbat_sylius_sagepay_plugin.ui.live' => false,
                ],
                'label' => 'sbarbat_sylius_sagepay_plugin.ui.mode',
            ])
            ->add('currency', ChoiceType::class, [
                'choices' => [
                    'sbarbat_sylius_sagepay_plugin.ui.currencies.GBP' => true,
                ],
                'label' => 'sbarbat_sylius_sagepay_plugin.ui.currency',
            ])
            ->add('vendorName', TextType::class, [
                'label' => 'sbarbat_sylius_sagepay_plugin.ui.vendor_name',
                'constraints' => [
                    new NotBlank([
                        'message' => 'sbarbat_sylius_sagepay_plugin.vendor_name.not_blank',
                        'groups' => ['sylius'],
                    ]),
                ],
            ])
            ->add('encryptionPasswordTest', TextType::class, [
                'label' => 'sbarbat_sylius_sagepay_plugin.ui.encryptation_password_test',
                'constraints' => [
                    new NotBlank([
                        'message' => 'sbarbat_sylius_sagepay_plugin.encryptation_password_test.not_blank',
                        'groups' => ['sylius'],
                    ]),
                ],
            ])
            ->add('encryptionPasswordLive', TextType::class, [
                'label' => 'sbarbat_sylius_sagepay_plugin.ui.encryptation_password_live',
                'constraints' => [
                    new NotBlank([
                        'message' => 'sbarbat_sylius_sagepay_plugin.encryptation_password_live.not_blank',
                        'groups' => ['sylius'],
                    ]),
                ],
            ])
            ->add('stateCodeAbbreviated', ChoiceType::class, [
                'label' => 'sbarbat_sylius_sagepay_plugin.ui.state_code_abbreviated',
                'help' => 'sbarbat_sylius_sagepay_plugin.ui.state_code_abbreviated_help',
                'choices' => [
                    'sbarbat_sylius_sagepay_plugin.ui.province_abbreviation' => true,
                    'sbarbat_sylius_sagepay_plugin.ui.province_code' => false,
                ],
            ])
        ;
    }
}
