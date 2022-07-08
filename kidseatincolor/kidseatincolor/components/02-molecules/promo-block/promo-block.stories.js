import React from 'react';

import promoBlock from './promo-block.twig';

import promoBlockData from './promo-block.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Promo Block' };

export const PromoBlock = () => (
  <div dangerouslySetInnerHTML={{ __html: promoBlock(promoBlockData) }} />
);
