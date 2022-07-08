import React from 'react';
import { useEffect } from '@storybook/client-api';

import productListing from './product-listing.twig';

import productListingData from './product-listing.yml';
import product from '../../02-molecules/product/product.yml';
import button from '../../01-atoms/buttons/twig/button.yml';
import carousel from './product-listing';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/Product Listing' };

export const ProductListing = () => {
  useEffect(() => {
    carousel.mount();
  }, []);
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: productListing({
          ...productListingData,
          ...product,
          ...button,
        }),
      }}
    />
  );
};
