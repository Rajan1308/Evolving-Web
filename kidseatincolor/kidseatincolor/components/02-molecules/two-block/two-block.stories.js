import React from 'react';

import twoblock from './two-block.twig';

import twoblockData from './twoblock.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/two-blocks' };

export const twoblockExample = () => (
  <div dangerouslySetInnerHTML={{ __html: twoblock(twoblockData) }} />
);
