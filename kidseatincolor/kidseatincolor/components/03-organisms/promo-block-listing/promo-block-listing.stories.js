import React from 'react';

import promoBlockListing from './promo-block-listing.twig';

import promoBlockListingData from './promo-block-listing.yml';
import promoBlockData from '../../02-molecules/promo-block/promo-block.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/Promo Block Listing' };

export const PromoBlockListing = () => (
  <div
    dangerouslySetInnerHTML={{
      __html: promoBlockListing({
        ...promoBlockListingData,
        ...promoBlockData,
      }),
    }}
  />
);
