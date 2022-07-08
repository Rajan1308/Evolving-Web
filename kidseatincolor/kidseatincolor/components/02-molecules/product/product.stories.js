import React from 'react';

import productBlock from './product.twig';

import productData from './product.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Product Block' };

export const ProductBlock = () => (
  <div dangerouslySetInnerHTML={{ __html: productBlock(productData) }} />
);
