import React from 'react';

import postListing from './post-listing.twig';

import postListingData from './post-listing.yml';
import postData from '../../02-molecules/post/post.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/Recent Post Listing' };

export const PostListing = () => (
  <div
    dangerouslySetInnerHTML={{
      __html: postListing({
        ...postListingData,
        ...postData,
      }),
    }}
  />
);
