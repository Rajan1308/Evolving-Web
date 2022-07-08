import React from 'react';

import twoColContent from './two-col-content-block.twig';

import twoColContentData from './two-col-content-block.yml';
import twoColContentRightImageData from './two-col-content-block-variation.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Two Col Content' };

export const ImageOnLeft = () => (
  <div dangerouslySetInnerHTML={{ __html: twoColContent(twoColContentData) }} />
);

export const ImageOnRight = () => (
  <div
    dangerouslySetInnerHTML={{
      __html: twoColContent(twoColContentRightImageData),
    }}
  />
);
